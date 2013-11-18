/**
 * Created with JetBrains PhpStorm.
 * User: tjoussen
 * Date: 17.09.13
 * Time: 12:41
 * To change this template use File | Settings | File Templates.
 */
(function($){

	/**
	 * @type {null|_Raidplanner}
	 * @private
	 */
    var _instance = null;

	/**
	 * @param {string} url
	 * @private
	 * @constructor
	 */
	var _Raidplanner = function(url){
		this.url = url;
	};

	_Raidplanner.prototype = {

		showRaid: function(element){
			//if(!$(element).hasClass("selected_raid")){
				$('.selected_raid').removeClass("selected_raid");
				$(element).addClass("selected_raid");

				_ajaxCall(
					"raid.show",
					{
						id: element.attr('id').replace("showRaid-", "")
					},
					function(data){
						_renderRaid(data);
					},
					"GET"
				);
			//}
		},

		updateRaidTable: function(){
			_ajaxCall(
				"raids.updateTable",
				{},
				function(data){
					_renderTableContent(data);
				},
				"GET"
			);
		},

		changeCharStatus: function(raid_id, status){
			var char_id = _getSelectedCharId();
			var comment = $("#current_raid").find('.invite-comment').val();

			if(_statusCanBeChanged(status, comment))
			{
				alert("Um den Status auf Vorläufig/Ablehnen zu setzen, muss ein Kommentar angegeben werden")
				return false;
			}

			_ajaxCall(
				"invites.changeStatus",//"changeCharStatus",
				{
					raid_id: raid_id,
					char_id: char_id,
					status: status,
					comment: comment
				},
				function(data){
					data.char_id = char_id;
					data.raid_id = raid_id;
					_renderUpdatedStatus(data,comment);
				}
			);
		},

		updateMultipleCharStatus: function(status){
			var raid_ids = _getSelectedIds($('table.wowraids').find('tbody').find("input[type=checkbox]"));
			var char_id = _getSelectedCharId();
			var comment = $("#multiple_status_comment").val();

			if(raid_ids.length == 0){
				return false;
			}

			if(status == "temporary" ||status == "rejected")
			{
				if(comment.trim() == ""){
					alert("Um den Status auf Vorläufig/Ablehnen zu setzen, muss ein Kommentar angegeben werden")
					return false;
				}
			}

			_ajaxCall(
				"invites.changeStatusMultiple",
				{
					raid_ids: raid_ids,
					char_id: char_id,
					status: status,
					comment: comment
				},
				function(data){
					$(data).each(function(){
						this.char_id = char_id;
						_renderUpdatedStatus(this, comment);
					});
				}
			);
		},

		changeLeadingStatus: function(raid_id, status){
			_ajaxCall(
				"invites.administrate",
				{
					raid_id: raid_id,
					chars: _getSelectedIds($('#current_raid').find('.member-table').find("input.invites")),
					status: status
				},
				function(data){
					$(data).each(function(){
						this.raid_id = raid_id;
						_renderUpdatedStatus(this);
					});
				}
			);
		},

		cancelRaid: function(raid_id){
			if(confirm("Raid wirklich absagen?")){
				_ajaxCall(
					"invites.administrate",
					{
						raid_id: raid_id,
						status: "cancelled",
						chars: _getSelectedIds($('#current_raid').find('.member-table').find("input.invites"), true)
					},
					function(data){
						$(data).each(function(){
							this.raid_id = raid_id;
							_renderUpdatedStatus(this);
						});
					}
				);
			}
		},

		deleteRaid: function(raid_id){
			if(confirm("Raid wirklich löschen?")){
				_ajaxCall(
					"raid.delete",
					{
						raid_id: raid_id
					},
					function(){
						_removeRaid(raid_id);
					}
				);
			}
		},

		duplicateRaid: function(cal){
            var dates = cal.multiple;
            var p = cal.params;

            for(var key in dates) {
                var element = $(p.inputField).closest("tr");
                var date = dates[key].print(p.ifFormat);

                _ajaxCall(
                    "raid.duplicate",
                    {
                        id: element.attr('id').replace("showRaid-", ""),
                        date: date
                    },
                    function(){}
                )
            }

            cal.hide();
           _instance.updateRaidTable();
		}
	};

	/**
	 * @param {Object} data
	 * @param {Object|undefined} comment
	 * @private
	 */
	var _renderUpdatedStatus = function (data, comment) {
		var line = $('.invite-' + data.char_id);
		line.find('.invite-status')
			.html("")
			.append(
				$('<span></span>')
					.addClass(data.status)
					.html(data.status_text)
			)

		if (comment != undefined) {
			line.find('.invite-comment')
				.html(comment);
		}

		if (data.char_id == _getSelectedCharId()) {
			$('#showRaid-' + data.raid_id).find('.invite-status')
				.html("")
				.append(
					$("<span></span>")
						.addClass(data.status)
						.html(data.status_text)
				)
		}
	};

	/**
	 * @returns {integer}
	 * @private
	 */
	var _getSelectedCharId = function () {
		return $('.wowchar.main').find('.char_id').val();
	};

	/**
	 * @param {Object} event
	 * @param {Object} comment
	 * @returns {boolean}
	 * @private
	 */
	var _statusCanBeChanged = function (status, comment) {
		return (status == "temporary" ||
			status == "rejected") &&
			comment.trim() == "";
	};

	/**
	 *
	 * @param {string} task
	 * @param {Array} data
	 * @param {function} callback
	 * @param {string|undefined} type
	 * @private
	 */
	var _ajaxCall = function (task, data, callback, type) {
		if (type == undefined) {
			type = "POST";
		}
		data.task = task;
		$.ajax({
			url: _instance.url,
			data: data,
			dataType: "JSON",
			type: type,
			success: callback
		});
	};

	/**
	 * Gets all selected IDS input[type=checkboxes] which are delivered as anchor
	 *
	 * @param {Object} anchor The anchor which includes all checkboxes
	 * @param {boolean|undefined} get_all If true, the function returns all checkboxes, indifferent they are checked or not
	 * @returns {Array} Array of all IDs
	 * @private
	 */
	var _getSelectedIds = function (anchor, get_all) {
		var ids = [];
		$(anchor).each(function (key) {
			if ((get_all == undefined && $(this).is(":checked")) || get_all) {
				ids[key] = $(this).val();
			}
		});
		return ids;
	};

	var _removeRaid = function(id) {
		$('#current_raid').hide();

		var prev = $('#showRaid-'+id).prev();
		if(prev != null && prev != undefined){
			_instance.showRaid(prev);
		}

		$("#showRaid-"+id).remove();
	};

	var _renderTableContent = function(data){
		var table = $('.wowraids').find("tbody");
		$(table).html(data.content);
	};

	var _renderRaid = function(data){
		$('#current_raid').html(data.content);
		return;
	};

	/**
	 * @param {string} url
	 * @returns {Raidplanner}
	 * @constructor
	 */
    jQuery.fn.Raidplanner = function(url){
		if(_instance == null){
			_instance = new _Raidplanner(url);
		}
		return _instance;
	};
})( jQuery );

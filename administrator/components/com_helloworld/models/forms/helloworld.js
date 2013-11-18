/**
 * Created with JetBrains PhpStorm.
 * User: tjoussen
 * Date: 10.07.13
 * Time: 09:01
 * To change this template use File | Settings | File Templates.
 */
window.addEvent('domready', function(){
	document.formvalidator.setHandler("greeting", function(value){
		regex=/^[^0-9]+$/;
		return regex.test(value);
	});
});
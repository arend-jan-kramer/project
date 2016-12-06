$(document).ready(function(){
	$('#getRequest').click(function(){
		$.get('getRequest' ,function(data){
			$('#getRequestData').append(data);
			console.log(data);
		})
	});
});


$(function()
{
	$('#datepicker').datetimepicker(
	{
		/*
			timeFormat
			Default: "HH:mm tt",
			A Localization Setting - String of format tokens to be replaced with the time.
		*/
		timeFormat: "H:mm",
		/*
			hourMin
			Default: 0,
			The minimum hour allowed for all dates.
		*/
		hourMin: 12,
		/*
			hourMax
			Default: 23, 
			The maximum hour allowed for all dates.
		*/
		hourMax: 22,
		/*
			numberOfMonths
			jQuery DatePicker option
			that will show two months in datepicker
		*/
		numberOfMonths: 1,
		/*
			minDate
			jQuery datepicker option 
			which set today date as minimum date
		*/
		minDate: 0,
		/*
			maxDate
			jQuery datepicker option 
			which set 30 days later date as maximum date
		*/
		maxDate: 30,

		stepMinute: 15,

		dateFormat: 'dd-mm-yy',

		monthNames: ['Januari','Februari','Maart','April','Mei','Juni',
			'Juli','Augustes','September','Oktober','November','December'],
		dayNamesShort: ['Zo','Ma','Di','Woe','Do','Vr','Za'],
		dayNamesMin: ['Zo','Ma','Di','Woe','Do','Vr','Za'],
		timeText: 'Uur',
		hourText: 'Uur',
		minuteText: 'Min',
		secondText: 'Sec',
		millisecText: 'MilSec',
		timezoneText: 'Nederlands',
		currentText: 'Hoi',
		closeText: 'Ok',
		isRTL: false,
		showMonthAfterYear: false
	});
});
(function(){
	var datepicker = {};
	datepicker.getMonthData = function(year, month){
		var ret = [];
		if(!year || !month)   // example 2016/12/1
		{
			var today = new Date();
			year = today.getFullYear();
			// console.log(year);
			month = today.getMonth() + 1;
			// console.log(month);
		}

		var firstDay = new Date(year, month-1, 1);
		// console.log(firstDay);
		var firstDayWeekDay = firstDay.getDay();
		// console.log("firstDay" + firstDayWeekDay);
		if(firstDayWeekDay === 0 ) firstDayWeekDay = 7;
		var lastDayofLastMonth = new Date(year, month-1, 0);
		// console.log(lastDayofLastMonth);
		var lastDateofLastMonth = lastDayofLastMonth.getDate();
		// console.log(lastDateofLastMonth);
		var preMonthDayCount = firstDayWeekDay - 1;

		var lastDay = new Date(year, month, 0);
		var lastDate = lastDay.getDate();

		for (var i=0; i < 7*6; i++)
		{
			var date = i + 1 - preMonthDayCount;  //获取日历第一格的日期 
			var Month = month;
			var showDate = date; 
			if(date <=0)
			{
				showDate = lastDateofLastMonth + date;
				Month = month - 1;
			}
			else if(date > lastDate){
				showDate = date - lastDate;
				Month = month + 1;
			}

			if(Month === 0) Month = 12;
			if(Month === 13) Month = 1;
			ret.push({
				month:Month,
				date: date,
				showDate: showDate
			});
		}
		return {
			year: year,
			month: month,
			days: ret
		}
	};

	window.datepicker = datepicker;
})();
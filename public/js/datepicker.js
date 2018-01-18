(function(){
	var datepicker = window.datepicker;
	var $wrapper;
	var	monthData = datepicker.getMonthData();
	datepicker.buildUi = function(year, month){
		monthData = datepicker.getMonthData(year, month);
		var html = '<div class="ui-datepicker-header">' +
			'<a href="#" class="ui-datepicker-btn ui-datepicker-prev-btn">&lt;</a>' +
			'<a href="#" class="ui-datepicker-btn ui-datepicker-next-btn">&gt;</a>' +
			'<span class="ui-datepicker-curr-month">'+ monthData.year+ '-' + monthData.month +'</span>' +
		'</div>' +
		'<div class="ui-datepicker-body">' +
			'<table>' +
				'<thead>' +
					'<tr>' +
						'<th>一</th>' +
						'<th>二</th>' +
						'<th>三</th>' +
						'<th>四</th>' +
						'<th>五</th>' +
						'<th>六</th>' +
						'<th>日</th>' +
					'</tr>' +
				'</thead>' +
				'<tbody>';
				for(var i=0; i< monthData.days.length; i++)
				{
					var date = monthData.days[i];
					if(i%7 === 0){
						html += '<tr>';
					}
					html += '<td data-date="' + date.date + '">' + date.showDate + '</td>';
					if(i%7 === 6){
						html += '</tr>';
					}
				}
					// '<tr>' +
					// 	'<td>29</td>' +
					// 	'<td>30</td>' +
					// 	'<td>1</td>' +
					// 	'<td>2</td>' +
					// 	'<td>3</td>' +
					// 	'<td>4</td>' +
					// 	'<td>5</td>' +
					// '</tr>' +
				
				html += '</tbody>' +
			'</table>' +
		'</div>';
		return html;

	};

	datepicker.render = function(direction){
		monthData.month = (monthData.month + direction + 13) % 13;
		if(monthData.month === 0)
		{
			if(direction < 0)
			{
			monthData.year--;
			monthData.month=12;
			}
			else{
			monthData.year++;
			monthData.month=1;	
			}
		}
		// console.log("month:" + monthData.month);
		var html = datepicker.buildUi(monthData.year, monthData.month);
		if(direction)
		{
			$wrapper.className = 'ui-datepicker-wrapper ui-datepicker-wrapper-show';
		}
		else{
			$wrapper.className = 'ui-datepicker-wrapper';	
		}
		$wrapper.innerHTML = html;
	}

	datepicker.init = function(input){
		
		$wrapper = document.createElement('div');
		datepicker.render();

		var $input = document.querySelector(input);
		var parent = $(input).parent()[0];
		// console.log(parent);
		parent.appendChild($wrapper);
		var isOpen = false;
		var closePicker = function(){
			$wrapper.classList.remove('ui-datepicker-wrapper-show');
			isOpen = false;
		}
		$input.addEventListener('click', function(){
			 if(isOpen){
				closePicker();
			}
			else
			{
				$wrapper.classList.add('ui-datepicker-wrapper-show');
				var left = $input.offsetLeft;
				var top = $input.offsetTop;
				var height = $input.offsetHeight;

				$wrapper.style.top = top + height + 2 + 'px';
				$wrapper.style.left = left + 'px';
				isOpen = true;
			}
		});
	 	$(document).click(function(e){  
	 		var $target = e.target;
	 		// console.log($target);
	 		if(!$target.classList.contains('datepicker'))
	 		{

        		closePicker();
	 		}
    	});  
		var $next = document.querySelector('.ui-datepicker-next-btn');
		var $pre = document.querySelector('.ui-datepicker-prev-btn'); //内部元素会被销毁重建 绑定事件无效

		$wrapper.addEventListener('click', function(e){
			var $target = e.target;
			// alert($target.classList.contains('ui-datepicker-btn'));
			if($target.classList.contains('ui-datepicker-btn'))
			{
				if($target.classList.contains('ui-datepicker-prev-btn'))
				{
					datepicker.render(-1);
				}
				else if($target.classList.contains('ui-datepicker-next-btn'))
				{
					datepicker.render(1);
				}

			}
			else if ($target.tagName.toLowerCase() == 'td')
			{
				var date = new Date(monthData.year, monthData.month - 1, $target.dataset.date);
				// alert(date);
				$input.value = format(date);
				closePicker();
			}
			

			


		}, false); 
	}

	function format(date)
	{
		ret = '';
		var padding = function(num){
			if(num <= 9)
			{
				return '0' + num;
			}
			return num;
		}
		ret += date.getFullYear() + '-';
		ret += padding(date.getMonth() + 1) + '-';
		ret += padding(date.getDate());

		 return ret;
	}
})();
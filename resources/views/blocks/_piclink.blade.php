<div class="col-sm-8 no-padding">
	
	<img src="{{asset('images/index_23.png')}}" alt="" usemap="#Map" width="800px">
	@include('partials._indexList', ['outerclass' => 'col-sm-6 list_from_other_web',  'columname' => '招聘信息', 'id_info' => 'info-list1'])
	@include('partials._indexList', ['outerclass' => 'col-sm-6 list_from_other_web', 'columname' => '实习信息','id_info' => 'info-list2'])
	<map name="Map" id="Map">
	  <area shape="rect" coords="85,24,356,75" href=" http://admin.ncss.org.cn " />
	  <area shape="rect" coords="380,26,474,77" href="http://dfjy.ncss.org.cn" />
	  <area shape="rect" coords="490,26,582,76" href="http://dfjy.ncss.org.cn/rec" />
	  <area shape="rect" coords="611,19,754,47" href="/Upload/Files/student_guide.pdf " />
	  <area shape="rect" coords="611,53,754,78" href="/Upload/Files/rec_guide.pdf " />
	</map>

</div>


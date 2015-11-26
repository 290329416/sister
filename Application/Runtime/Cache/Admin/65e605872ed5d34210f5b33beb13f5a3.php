<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="utf-8" />
	<title>查看所有用户</title>

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- basic styles -->

	<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />

	<!--[if IE 7]>
	  <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />
	<![endif]-->

	<!-- page specific plugin styles -->

	<!-- fonts -->

	<link rel="stylesheet" href="/Public/assets/css/ace-fonts.css" />

	<!-- ace styles -->

	<link rel="stylesheet" href="/Public/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />

	<!--[if lte IE 8]>
	  <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->

	<script src="/Public/assets/js/ace-extra.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>
	<script src="/Public/assets/js/html5shiv.js"></script>
	<script src="/Public/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<div class="navbar-container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<i class="icon-leaf"></i>
					Hello
				</small>
			</a><!-- /.brand -->
		</div><!-- /.navbar-header -->

		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							<?php echo ($user_data["username"]); ?>
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="/admin_china.php/user/show/id/<?php echo ($user_data["id"]); ?>">
								<i class="icon-cog"></i>
								个人资料
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="/admin_china.php/login/quit">
								<i class="icon-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>
			</ul><!-- /.ace-nav -->
		</div><!-- /.navbar-header -->
	</div><!-- /.container -->
</div>
 
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>
	<ul class="nav nav-list">
		<li>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-desktop"></i>
				<span class="menu-text">用户管理</span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="/admin_china.php/User/index">
						<i class="icon-double-angle-right"></i>
						查看所有用户
					</a>
				</li>

				<li>
					<a href="/admin_china.php/User/add">
						<i class="icon-double-angle-right"></i>
						添加用户
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-list"></i>
				<span class="menu-text"> 栏目管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="/admin_china.php/Type/index">
						<i class="icon-double-angle-right"></i>
						查看所有栏目
					</a>
				</li>

				<li>
					<a href="/admin_china.php/Type/add">
						<i class="icon-double-angle-right"></i>
						添加栏目
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-edit"></i>
				<span class="menu-text"> 文章管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">

				<li>
					<a href="/admin_china.php/News/index">
						<i class="icon-double-angle-right"></i>
						查看所有文章
					</a>
				</li>

				<li>
					<a href="/admin_china.php/News/add">
						<i class="icon-double-angle-right"></i>
						添加文章
					</a>
				</li>

			</ul>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-tag"></i>
				<span class="menu-text">友情链接</span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">

				<li>
					<a href="/admin_china.php/Links/index">
						<i class="icon-double-angle-right"></i>
						查看友情链接
					</a>
				</li>

				<li>
					<a href="/admin_china.php/Links/add">
						<i class="icon-double-angle-right"></i>
						添加友链
					</a>
				</li>

			</ul>
		</li>
	
		<li>
			<a href="calendar.html">
				<i class="icon-calendar"></i>

				<span class="menu-text">
					Calendar
					<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
						<i class="icon-warning-sign red bigger-130"></i>
					</span>
				</span>
			</a>
		</li>

		<li>
			<a href="gallery.html">
				<i class="icon-picture"></i>
				<span class="menu-text"> Gallery </span>
			</a>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-tag"></i>
				<span class="menu-text"> More Pages </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="profile.html">
						<i class="icon-double-angle-right"></i>
						User Profile
					</a>
				</li>

				<li>
					<a href="inbox.html">
						<i class="icon-double-angle-right"></i>
						Inbox
					</a>
				</li>

				<li>
					<a href="pricing.html">
						<i class="icon-double-angle-right"></i>
						Pricing Tables
					</a>
				</li>

				<li>
					<a href="invoice.html">
						<i class="icon-double-angle-right"></i>
						Invoice
					</a>
				</li>

				<li>
					<a href="timeline.html">
						<i class="icon-double-angle-right"></i>
						Timeline
					</a>
				</li>

				<li>
					<a href="login.html">
						<i class="icon-double-angle-right"></i>
						Login &amp; Register
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-file-alt"></i>

				<span class="menu-text">
					Other Pages
					<span class="badge badge-primary ">5</span>
				</span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="faq.html">
						<i class="icon-double-angle-right"></i>
						FAQ
					</a>
				</li>

				<li>
					<a href="error-404.html">
						<i class="icon-double-angle-right"></i>
						Error 404
					</a>
				</li>

				<li>
					<a href="error-500.html">
						<i class="icon-double-angle-right"></i>
						Error 500
					</a>
				</li>

				<li>
					<a href="grid.html">
						<i class="icon-double-angle-right"></i>
						Grid
					</a>
				</li>

				<li>
					<a href="blank.html">
						<i class="icon-double-angle-right"></i>
						Blank Page
					</a>
				</li>
			</ul>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div> 
				
<div class="main-content">
	<div id="breadcrumbs" class="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="/admin_china.php">首页</a>
			</li>
			<li>
				<a href="/admin_china.php/user/index">查看所有用户</a>
			</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
					<div class="col-xs-12">
						<div class="table-header">
							Results for "Latest user"
						</div>

						<div class="table-responsive">
							<div role="grid" class="dataTables_wrapper" id="sample-table-2_wrapper">
								<div class="row">
										<div class="col-sm-6">
											<div id="sample-table-2_length" class="dataTables_length">
												<div class="dataTables_filter" id="sample-table-2_filter">
													<form action="/admin_china.php/User/index" method='post'>
													<label>搜索公司名称: <input type="text" name='name' aria-controls="sample-table-2"></label>
													<button class="btn btn-sm btn-primary">搜索</button>
													</form>
												</div>
												
											</div>
										</div>
								</div>
								<table class="table table-striped table-bordered table-hover dataTable" id="sample-table-2" aria-describedby="sample-table-2_info">
								<thead>
									<tr role="row">
										<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 120px;" aria-label="Domain: activate to sort column ascending">用户名</th>
										<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 160px;" aria-label="Price: activate to sort column ascending">公司名称</th>
										<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 120px;" aria-label="Price: activate to sort column ascending">邮箱</th>
										<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 100px;" aria-label="Clicks: activate to sort column ascending">联系电话</th>
										<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 100px;" aria-label="Update: activate to sort column ascending"><i class="icon-time bigger-110 hidden-480"></i>注册时间</th>
										<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 40px;" aria-label="Status: activate to sort column ascending">状态</th>
										<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 130px;" aria-label="">操作</th></tr>
								</thead>

								
							<tbody role="alert" aria-live="polite" aria-relevant="all">

								<?php if(is_array($users)): foreach($users as $key=>$user): ?><tr class="odd">
										<td class="">
											<a href="/admin_china.php/User/show/id/<?php echo ($user["id"]); ?>"><?php echo ($user["username"]); ?></a>
										</td>
										<td class=" "><?php echo ($user["name"]); ?></td>
										<td class=" "><?php echo ($user["email"]); ?></td>
										<td class="hidden-480 "><?php echo ($user["phone"]); ?></td>
										<td class=" "><?php echo (date("Y-m-d H:i",$user["inputtime"])); ?></td>

										<td class="hidden-480 ">
											<?php if($user["state"] == 1): ?><span class="label label-sm label-warning">普通用户</span>
											<?php elseif($user["state"] == '2'): ?>
												<span class="label label-sm label-inverse arrowed-in">禁止使用</span>
											<?php elseif($user["state"] == '0'): ?>
												<span class="label label-sm label-success">后台管理员</span><?php endif; ?>
										</td>
										<td class=" ">
											<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
												<a href="/admin_china.php/User/show/id/<?php echo ($user["id"]); ?>" class="blue" title='查看详情'>
													<i class="icon-zoom-in bigger-130"></i>
													查看
												</a>

												<a href="/admin_china.php/User/update/id/<?php echo ($user["id"]); ?>" class="green" title='修改信息'>
													<i class="icon-pencil bigger-130"></i>
													修改
												</a>

												<a href="javascript:;" onclick="delfun(<?php echo ($user["id"]); ?>)" class="red" title='删除'>
													<i class="icon-trash bigger-130"></i>
													删除
												</a>
											</div>
										</td>
									</tr><?php endforeach; endif; ?>
								</tbody></table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="sample-table-2_info">共<?php echo ($count); ?>条数据&nbsp;&nbsp;&nbsp;总页数&nbsp;<?php echo ($num); ?></div></div><div class="col-sm-6">
								<div class="dataTables_paginate paging_bootstrap">
									<ul class="pagination">
										<?php echo ($pages); ?>
									</ul></div></div></div></div>
						</div>
					</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>
<script>
function delfun(userid){
	if(confirm("确认删除本数据?")){
		window.location.href='/admin_china.php/User/delete/id/'+userid;
	}
}
</script>

				

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp;更改背景色</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar">固定导航栏</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar">固定侧边栏</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">左边栏->右边栏</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								<b>居中</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/assets/js/bootstrap.min.js"></script>
		<script src="/Public/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/Public/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/Public/assets/js/jquery.sparkline.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/Public/assets/js/ace-elements.min.js"></script>
		<script src="/Public/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
	</body>
</html>
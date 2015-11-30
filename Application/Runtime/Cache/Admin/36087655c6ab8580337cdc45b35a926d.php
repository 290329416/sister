<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>查看文章</title>

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
							<a href="<?php echo U('user/show','id='.$user_data[id]);?>">
								<i class="icon-cog"></i>
								个人资料
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo U('login/quit');?>">
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
					<a href="<?php echo U('User/index');?>">
						<i class="icon-double-angle-right"></i>
						查看所有用户
					</a>
				</li>

				<li>
					<a href="<?php echo U('User/add');?>">
						<i class="icon-double-angle-right"></i>
						添加用户
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-list"></i>
				<span class="menu-text"> 栏目管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo U('Type/index');?>">
						<i class="icon-double-angle-right"></i>
						查看所有栏目
					</a>
				</li>

				<li>
					<a href="<?php echo U('Type/add');?>">
						<i class="icon-double-angle-right"></i>
						添加栏目
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-edit"></i>
				<span class="menu-text"> 文章管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">

				<li>
					<a href="<?php echo U('News/index');?>">
						<i class="icon-double-angle-right"></i>
						查看所有文章
					</a>
				</li>

				<li>
					<a href="<?php echo U('News/add');?>">
						<i class="icon-double-angle-right"></i>
						添加文章
					</a>
				</li>

			</ul>
		</li>
		
		<li>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-file-alt"></i>

				<span class="menu-text">
					公共留言管理
				</span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo U('Message/index');?>">
						<i class="icon-double-angle-right"></i>
						查看所有留言
					</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-tag"></i>
				<span class="menu-text">友情链接</span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">

				<li>
					<a href="<?php echo U('Links/index');?>">
						<i class="icon-double-angle-right"></i>
						查看友情链接
					</a>
				</li>

				<li>
					<a href="<?php echo U('Links/add');?>">
						<i class="icon-double-angle-right"></i>
						添加友链
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
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="/admin_china.php?s=">首页</a>
							</li>

							<li>
								<a href="/admin_china.php?s=/News">查看所有文章</a>
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
							Results for "Latest Article"
						</div>

						<div class="table-responsive">
							<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
								<div class="row">
										<div class="col-sm-6" style='width:100%'>
											<div class="dataTables_length" id="sample-table-2_length">
												<div id="sample-table-2_filter" class="dataTables_filter">
													<form action="/admin_china.php?s=/News/index">
													<label>搜索文章标题: <input type="text" aria-controls="sample-table-2" name="title"></label>
													<label>请选择栏目: 
														<select name="pid" size="1" aria-controls="sample-table-2" style='width:120px;'>
															<option value=""></option>
															<?php if(is_array($type)): foreach($type as $key=>$type): ?><option value="<?php echo ($type["id"]); ?>"><?php echo ($type["name"]); ?></option><?php endforeach; endif; ?>
														</select>
													</label>
													<label>请选择状态: 
														<select name="state" size="1" aria-controls="sample-table-2" style='width:80px;'>
															<option value=""></option>
															<option value="1">未审核</option>
															<option value="2">已发布</option>
															<option value="3">禁用</option>
														</select>
													</label>
													&nbsp;&nbsp;&nbsp;&nbsp;
													<button class="btn btn-sm btn-primary">搜索</button>
													</form>
												</div>
												
											</div>
										</div>
								</div>
								<table aria-describedby="sample-table-2_info" id="sample-table-2" class="table table-striped table-bordered table-hover dataTable">
								<thead>
									<tr role="row">
										<th aria-label="Domain: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">文章标题</th>
										<th aria-label="Price: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">栏目名称</th>
										<th aria-label="Price: activate to sort column ascending" style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="sorting">文件发布时间</th>
										<th aria-label="Status: activate to sort column ascending" style="width: 40px;" colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="0" role="columnheader" class="hidden-480 sorting">状态</th>
										<th aria-label="" style="width: 130px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">操作</th></tr>
								</thead>

								
							<tbody aria-relevant="all" aria-live="polite" role="alert">
								<?php if(is_array($new)): foreach($new as $key=>$new): ?><tr class="odd">
										<td class="">
											<a href="/admin_china.php?s=/News/show/id/<?php echo ($new["id"]); ?>"><?php echo ($new["title"]); ?></a>
										</td>
										<td class=""><?php echo $typedata[$new['pid']] ?></td>
										<td class=""><?php echo ($new["releasetime"]); ?></td>

										<td class="hidden-480 ">
											<?php if($new["state"] == 1): ?><span class="label label-sm label-warning">未审核</span>
											<?php elseif($new["state"] == 2): ?>
												<span class="label label-sm label-success">已发布</span>
											<?php elseif($new["state"] == 3): ?>
												<span class="label label-sm label-inverse arrowed-in">已禁用</span><?php endif; ?>
										</td>
										<td class=" ">
											<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
												<a title="查看详情" class="blue" href="/admin_china.php?s=/News/show/id/<?php echo ($new["id"]); ?>">
													<i class="icon-zoom-in bigger-130"></i>
													查看
												</a>

												<a title="修改信息" class="green" href="/admin_china.php?s=/News/update/id/<?php echo ($new["id"]); ?>">
													<i class="icon-pencil bigger-130"></i>
													修改
												</a>

												<a title="删除" class="red" onclick="delfun(<?php echo ($new["id"]); ?>)" href="javascript:;">
													<i class="icon-trash bigger-130"></i>
													删除
												</a>
											</div>
										</td>
									</tr><?php endforeach; endif; ?>							
							</tbody>
							</table>
							<div class="row">
								<div class="col-sm-6">
									<div id="sample-table-2_info" class="dataTables_info">共<?php echo ($count); ?>条数据&nbsp;&nbsp;&nbsp;总页数&nbsp;<?php echo ($num); ?></div>
								</div>
								<div class="col-sm-6">
									<div class="dataTables_paginate paging_bootstrap">
									<ul class="pagination">
										<?php echo ($pages); ?>
									</ul>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
</div><!-- /.main-content -->

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
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
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
			function delfun(id){
				if(confirm("确认删除本数据?")){
					window.location.href='/admin_china.php?s=/News/delete/id/'+id;
				}
			}
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

		<script src="/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="/Public/assets/js/ace-elements.min.js"></script>
		<script src="/Public/assets/js/ace.min.js"></script>

	</body>
</html>
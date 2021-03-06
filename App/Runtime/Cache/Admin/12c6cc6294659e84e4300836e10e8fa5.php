<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="renderer" content="webkit">
	<title></title>
	<link rel="stylesheet" href="/jdzx/Public/Admin/css/pintuer.css">
	<link rel="stylesheet" href="/jdzx/Public/Admin/css/admin.css">
	<script src="/jdzx/Public/Admin/js/jquery.js"></script>
	<script src="/jdzx/Public/Admin/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
	<div class="panel admin-panel">
		<div class="panel-head"><strong class="icon-reorder"> 项目列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
		<div class="padding border-bottom">
			<ul class="search" style="padding-left:10px;">
				<li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Fenlei/add');?>"> 新增项目</a> </li>
			</ul>
		</div>
		<table class="table table-hover text-center">
			<tr>
				<th width="100" style="text-align:left; padding-left:20px;">ID</th>
				<th>项目名称</th>
				<th>所属类别</th>
				<th>封面图片</th>

				<th width="310">操作</th>
			</tr>
			<volist name="list" id="vo">
				<?php foreach($data as $v): ?>
				<tr>
					<td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
						<?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["title"]); ?></td>
					<?php if($v['pid'] == 1): ?><td>签证</td>
						<?php else: ?>
						<td>移民</td><?php endif; ?>
					<td><img src="/jdzx/Public/Uploads/<?php echo ($v["sm_logo"]); ?>"></td>
					<td><div class="button-group">
						<a class="button border-main" href="<?php echo U('edit?id='.$v['id']);?>"><span class="icon-edit"></span> 修改</a>
						<a class="button border-red" href="<?php echo U('delete?id='.$v['id']);?>" onclick="return confirm('确定要删除吗?');"><span class="icon-trash-o"></span> 删除</a>
					</div></td>
				</tr>

				<?php endforeach;?>

		</table>
	</div>
</form>
<script type="text/javascript">

	//搜索
	function changesearch(){

	}

	//单个删除
	function del(id,mid,iscid){
		if(confirm("您确定要删除吗?")){

		}
	}

	//全选
	$("#checkall").click(function(){
		$("input[name='id[]']").each(function(){
			if (this.checked) {
				this.checked = false;
			}
			else {
				this.checked = true;
			}
		});
	})

	//批量删除
	function DelSelect(){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){
			var t=confirm("您确认要删除选中的内容吗？");
			if (t==false) return false;
			$("#listform").submit();
		}
		else{
			alert("请选择您要删除的内容!");
			return false;
		}
	}

	//批量排序
	function sorts(){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){

			$("#listform").submit();
		}
		else{
			alert("请选择要操作的内容!");
			return false;
		}
	}


	//批量首页显示
	function changeishome(o){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){

			$("#listform").submit();
		}
		else{
			alert("请选择要操作的内容!");

			return false;
		}
	}

	//批量推荐
	function changeisvouch(o){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){


			$("#listform").submit();
		}
		else{
			alert("请选择要操作的内容!");

			return false;
		}
	}

	//批量置顶
	function changeistop(o){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){

			$("#listform").submit();
		}
		else{
			alert("请选择要操作的内容!");

			return false;
		}
	}


	//批量移动
	function changecate(o){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){

			$("#listform").submit();
		}
		else{
			alert("请选择要操作的内容!");

			return false;
		}
	}

	//批量复制
	function changecopy(o){
		var Checkbox=false;
		$("input[name='id[]']").each(function(){
			if (this.checked==true) {
				Checkbox=true;
			}
		});
		if (Checkbox){
			var i = 0;
			$("input[name='id[]']").each(function(){
				if (this.checked==true) {
					i++;
				}
			});
			if(i>1){
				alert("只能选择一条信息!");
				$(o).find("option:first").prop("selected","selected");
			}else{

				$("#listform").submit();
			}
		}
		else{
			alert("请选择要复制的内容!");
			$(o).find("option:first").prop("selected","selected");
			return false;
		}
	}

</script>
</body>
</html>
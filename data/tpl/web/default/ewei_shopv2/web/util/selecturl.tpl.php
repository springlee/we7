<?php defined('IN_IA') or exit('Access Denied');?><div class="modal-dialog">
	<style>
		#selectUrl .modal-body {padding: 10px 15px;}
		#selectUrl .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
		#selectUrl .page-head {padding: 9px 0; margin-bottom: 8px;}
		#selectUrl .page-head h4 {margin: 0;}
		#selectUrl .btn {margin-bottom: 3px;}
		#selectUrl .modal-dialog {width: 930px;}
		#selectUrl .line {border-bottom: 1px dashed #ddd; color: #999; height: 36px; line-height: 36px;}
		#selectUrl .line .icon {height: 35px; width: 30px; position: relative; float: left;}
		#selectUrl .line .icon.icon-1:before {content: ""; width: 10px; height: 10px; border: 1px dashed #ccc; position: absolute; top: 12px; left: 10px;}
		#selectUrl .line .icon.icon-2 {width: 50px;}
		#selectUrl .line .icon.icon-2:before {content: ""; width: 10px; height: 10px; border-left: 1px dashed #ccc; border-bottom: 1px dashed #ccc; position: absolute; top: 12px; left: 20px;}
		#selectUrl .line .icon.icon-3 {width: 60px;}
		#selectUrl .line .icon.icon-3:before {content: ""; width: 10px; height: 10px; border-left: 1px dashed #ccc; border-bottom: 1px dashed #ccc; position: absolute; top: 12px; left: 30px;}
		#selectUrl .line .btn-sm {float: right; margin-top: 5px; margin-right: 5px; height: 24px; line-height: 24px; padding: 0 10px;}
		#selectUrl .line .text {display: block;}
		#selectUrl .line .label-sm {padding: 2px 5px;}
		#selectUrl .line.good {height: 60px; padding: 4px 0;}
		#selectUrl .line.good .image {height: 50px; width: 50px; border: 1px solid #ccc; float: left;}
		#selectUrl .line.good .image img {height: 100%; width: 100%;}
		#selectUrl .line.good .text {padding-left: 60px; height: 52px;}
		#selectUrl .line.good .text p {padding: 0; margin: 0;}
		#selectUrl .line.good .text .name {font-size: 15px; line-height: 32px; height: 28px;}
		#selectUrl .line.good .text .price {font-size: 12px; line-height: 18px; height: 18px;}
		#selectUrl .line.good .btn-sm {height: 32px; padding: 5px 10px; line-height: 22px; margin-top: 9px;}
		#selectUrl .tip {line-height: 250px; text-align: center;}
		#selectUrl .nav-tabs > li > a {padding: 8px 20px;}
	</style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">选择链接</h4>
        </div>
        <div class="modal-body">
        	<ul class="nav nav-tabs" id="selectUrlTab">
				<li class="active"><a href="#sut_shop">商城</a></li>
				<?php  if($platform!='wxapp_tabbar') { ?>
					<li class=""><a href="#sut_good">商品</a></li>
					<?php  if($syscate['level']!=-1 && !empty($categorys)) { ?>
						<li class=""><a href="#sut_cate">商品分类</a></li>
					<?php  } ?>
				<?php  } ?>

				<?php  if($platform=='wxapp') { ?>
				<li class=""><a href="#sut_diyurl">第三方链接</a></li>
				<li class=""><a href="#sut_diymobile">电话</a></li>
				<?php  } ?>

				<?php  if(p('article') && !$platform) { ?>
					<li class=""><a href="#sut_article"><?php  echo m('plugin')->getName('article')?></a></li>
				<?php  } ?>
				<?php  if(com('coupon') && !$platform) { ?>
					<li class=""><a href="#sut_coupon">超级券</a></li>
				<?php  } ?>
				<?php  if(p('diypage') && !$platform) { ?>
					<li class=""><a href="#sut_diypage"><?php  echo m('plugin')->getName('diypage')?></a></li>
				<?php  } ?>
				<?php  if(p('groups') && !$platform) { ?>
					<li class=""><a href="#sut_groups"><?php  echo m('plugin')->getName('groups')?></a></li>
				<?php  } ?>
				<?php  if(p('sns') && !$platform) { ?>
					<li class=""><a href="#sut_sns"><?php  echo m('plugin')->getName('sns')?></a></li>
				<?php  } ?>
				<?php  if(p('creditshop') && !$platform) { ?>
					<li class=""><a href="#sut_creditshop"><?php  echo m('plugin')->getName('creditshop')?></a></li>
				<?php  } ?>
				<?php  if(p('quick') && !$platform) { ?>
					<li class=""><a href="#sut_quick"><?php  echo m('plugin')->getName('quick')?></a></li>
				<?php  } ?>
			</ul>
			<div class="tab-content ">
				
				<div class="tab-pane active" id="sut_shop">
					<?php  if($platform) { ?>
					<div class="alert alert-primary" style="margin-bottom: 0;">
						<p>如果底部菜单中已经选择该链接，页面中选择后点击无效</p>
						<?php  if($platform=='wxapp_tabbar') { ?>
							<p>底部菜单只可选择部分页面地址</p>
						<?php  } ?>
					</div>
					<?php  } ?>

					<?php  if(is_array($allUrls)) { foreach($allUrls as $item) { ?>
						<div class="page-head"><h4><i class="fa fa-folder-open-o"></i> <?php  echo $item['name'];?></h4></div>
						<?php  if(is_array($item['list'])) { foreach($item['list'] as $child) { ?>
							<nav data-href="<?php echo $platform?$child['url_wxapp']:$child['url']?>" class="btn btn-default btn-sm" title="商城首页"><?php  echo $child['name'];?></nav>
						<?php  } } ?>
					<?php  } } ?>
				</div>
				
				<div class="tab-pane" id="sut_good">
					<div class="input-group">
						<input type="text" placeholder="请输入商品名称进行搜索" id="select-good-kw" value="" class="form-control">
							<span class="input-group-addon btn btn-default select-btn" data-type="good">搜索</span>
					</div>
					<div id="select-good-list"></div>
				</div>
				
				<div class="tab-pane" id="sut_cate">
					<?php  if(is_array($categorys)) { foreach($categorys as $category) { ?>
						 <?php  if(empty($category['parentid'])) { ?>
							<div class="line">
								<div class="icon icon-1"></div>
								<nav title="选择" class="btn btn-default btn-sm" data-href="<?php  if($platform) { ?>/pages/goods/index/index?cate=<?php  echo $category['id'];?><?php  } else { ?><?php  echo mobileUrl('goods',array('cate'=>$category['id']), $full)?><?php  } ?>">选择</nav>
								<div class="text"><?php  echo $category['name'];?></div>
							</div>
							 <?php  if(is_array($categorys)) { foreach($categorys as $category2) { ?>
							 	<?php  if($category2['parentid']==$category['id']) { ?>
								 	<div class="line">
										<div class="icon icon-2"></div>
										<nav title="选择" class="btn btn-default btn-sm" data-href="<?php  if($platform) { ?>/pages/goods/index/index?cate=<?php  echo $category2['id'];?><?php  } else { ?><?php  echo mobileUrl('goods',array('cate'=>$category2['id']), $full)?><?php  } ?>">选择</nav>
										<div class="text"><?php  echo $category2['name'];?></div>
									</div>
									<?php  if(is_array($categorys)) { foreach($categorys as $category3) { ?>
										 <?php  if($category3['parentid']==$category2['id']) { ?>
											 <div class="line">
												<div class="icon icon-3"></div>
												<nav title="选择" class="btn btn-default btn-sm" data-href="<?php  if($platform) { ?>/pages/goods/index/index?cate=<?php  echo $category3['id'];?><?php  } else { ?><?php  echo mobileUrl('goods',array('cate'=>$category3['id']), $full)?><?php  } ?>">选择</nav>
												<div class="text"><?php  echo $category3['name'];?></div>
											</div>
										 <?php  } ?>
									<?php  } } ?>
							 	<?php  } ?>
							 <?php  } } ?>
						<?php  } ?>
					<?php  } } ?>
				</div>

				<?php  if($platform=='wxapp') { ?>
					<div class="tab-pane" id="sut_diyurl" style="min-height: 100px;">
						<div class="row" style="margin: 100px 80px 80px;">
							<div class="input-group">
								<span class="input-group-addon">https://</span>
								<input type="text" placeholder="请输入已在小程序管理后台配置白名单的域名 例如：www.baidu.com" id="select-diyurl-kw" value="<?php  echo $defaultUrl;?>" class="form-control">
								<span class="input-group-addon btn btn-primary select-btn" data-type="diyurl">确认使用</span>
								<nav id="select-diy-url"></nav>
							</div>
							<div class="help-block text-danger">注意：1. 目标链接域名需到<a href="https://mp.weixin.qq.com/" target="_blank" class="text-danger"><b>小程序管理后台</b></a>配置域名白名单 </div>
							<div class="help-block text-danger" style="padding-left: 37px;">2. 目标链接必须支持https，否则无法打开</div>
							<div class="help-block text-danger" style="padding-left: 37px;">3. 点击链接将跳出小程序与小程序无关</div>
						</div>
					</div>

					<div class="tab-pane" id="sut_diymobile" style="min-height: 100px;">
						<div class="row" style="margin: 100px 80px 80px;">
							<div class="input-group">
								<span class="input-group-addon">电话</span>
								<input type="text" placeholder="请在此输入有效电话号码" id="select-diymobile-kw" value="" class="form-control">
								<span class="input-group-addon btn btn-primary select-btn" data-type="diymobile">确认使用</span>
								<nav id="select-diy-diymobile"></nav>
							</div>
						</div>
					</div>
				<?php  } ?>
			
			<?php  if(p('article')) { ?>
				<div class="tab-pane" id="sut_article">
					<div class="input-group">
						<input type="text" placeholder="请输入文章名称进行搜索" id="select-article-kw" value="" class="form-control">
							<span class="input-group-addon btn btn-default select-btn" data-type="article">搜索</span>
					</div>
					<div id="select-article-list"></div>
				</div>
			<?php  } ?>
			
				<div class="tab-pane" id="sut_coupon">
					<div class="input-group">
						<input type="text" placeholder="请输入优惠券名称进行搜索" id="select-coupon-kw" value="" class="form-control">
							<span class="input-group-addon btn btn-default select-btn" data-type="coupon">搜索</span>
					</div> 
					<div id="select-coupon-list"></div>
				</div>

			<?php  if(p('diypage')) { ?>
				<div class="tab-pane" id="sut_diypage">
					<?php  if(!empty($diypage['list'])) { ?>
						<?php  if(is_array($diypage['list'])) { foreach($diypage['list'] as $item) { ?>
							<?php  if($item['type']!=5 && $item['type']!=7) { ?>
								<div class="line">
									<nav title="选择" class="btn btn-default btn-sm" data-href="<?php  echo mobileUrl('diypage',array('id'=>$item['id']))?>">选择</nav>
									<div class="text"><span class="label label-<?php  echo $allpagetype[$item['type']]['class'];?> label-sm"><?php  echo $allpagetype[$item['type']]['name'];?></span> <?php  echo $item['name'];?></div>
								</div>
							<?php  } ?>
						<?php  } } ?>
					<?php  } else { ?>
						<div class="tip">抱歉！未查询到DIY页面。</div>
					<?php  } ?>
				</div>
			<?php  } ?>

			<?php  if(p('groups')) { ?>
				<div class="tab-pane" id="sut_groups">
					<div class="input-group">
						<input type="text" placeholder="请输入商品名称进行搜索" id="select-groups-kw" value="" class="form-control">
						<span class="input-group-addon btn btn-default select-btn" data-type="groups">搜索</span>
					</div>
					<div id="select-groups-list"></div>
				</div>
			<?php  } ?>

			<?php  if(p('sns')) { ?>
				<div class="tab-pane" id="sut_sns">
					<div class="input-group">
						<input type="text" placeholder="请输入板块名称、帖子标题进行搜索" id="select-sns-kw" value="" class="form-control">
						<span class="input-group-addon btn btn-default select-btn" data-type="sns">搜索</span>
					</div>
					<div id="select-sns-list"></div>
				</div>
			<?php  } ?>

			<?php  if(p('groups')) { ?>
				<div class="tab-pane" id="sut_creditshop">
					<div class="input-group">
						<input type="text" placeholder="请输入商品名称进行搜索" id="select-creditshop-kw" value="" class="form-control">
						<span class="input-group-addon btn btn-default select-btn" data-type="creditshop">搜索</span>
					</div>
					<div id="select-creditshop-list"></div>
				</div>
			<?php  } ?>

			<?php  if(p('quick')) { ?>
				<div class="tab-pane" id="sut_quick">
					<?php  if(!empty($quickList)) { ?>
						<?php  if(is_array($quickList)) { foreach($quickList as $item) { ?>
							<div class="line">
								<nav title="选择" class="btn btn-default btn-sm" data-href="<?php  echo mobileUrl('quick',array('id'=>$item['id']))?>">选择</nav>
								<div class="text"><?php  if(empty($item['status'])) { ?><span class="label label-sm label-default">关闭状态</span> <?php  } ?><?php  echo $item['title'];?></div>
							</div>
						<?php  } } ?>
					<?php  } else { ?>
						<div class="tip">抱歉！未查询到快速购买页面。</div>
					<?php  } ?>
				</div>
			<?php  } ?>

			</div>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
        </div>
        <script>
        	$(function(){
        		$("#selectUrl").find('#selectUrlTab a').click(function(e) {
						$('#tab').val($(this).attr('href'));
						e.preventDefault();
						$(this).tab('show');
				});
        		$(".select-btn").click(function(){
        			var type = $(this).data("type");
        			var kw = $.trim($("#select-"+type+"-kw").val());

					if(type=='diyurl'){
						if(!kw || kw==''){
							tip.msgbox.err("请输入第三方链接！");
							return;
						}
						kw = kw.replace('http://', '');
						kw = kw.replace('https://', '');
						$('#select-diy-url').data('href', '/pages/web/index?url=' + encodeURIComponent('https://' + kw)).trigger('click');
						return;
					}

					if(type=='diymobile'){
						if(!kw || kw==''){
							tip.msgbox.err("请输入电话！");
							return;
						}
						$('#select-diy-diymobile').data('href', kw).trigger('click');
						return;
					}

        			if(!kw || kw==''){
        				tip.msgbox.err("请输入搜索关键字！");
        				return;
        			}

        			$("#select-"+type+"-list").html('<div class="tip">正在进行搜索...</div>');
        			$.ajax("<?php  echo webUrl('util/selecturl/query', array('full'=>$full, 'platform'=>$platform))?>", {
		      			type: "get",
		      			dataType: "html",
		      			cache: false,
		      			data: {kw:kw, type:type}
		      		}).done(function (html) {
		      			$("#select-"+type+"-list").html(html);
		      		});
        		});
        	});
        </script>
    </div>
 </div>
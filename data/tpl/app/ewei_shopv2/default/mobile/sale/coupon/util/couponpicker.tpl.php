<?php defined('IN_IA') or exit('Access Denied');?><link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon-new.css?v=20170303">
<script id="tpl_getcoupons" type="text/html">
	<div class="coupon-picker option-picker">
		<div class="option-picker-inner coupon-picker">
			<div class="coupon-list mini">
				<%each coupons as coupon%>
				<div class="coupon-item  <%coupon.color%> ">
					<div class="coupon-dots">
						<i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
					</div>
					<div class="coupon-left">
						<div class="single"><%if coupon.backpre%><span class="subtitle">￥</span><%/if%><%coupon.backmoney%><%if coupon.backtype==1%><span class="subtitle">折</span><%/if%></div>
					</div>
					<div class="coupon-right">
						<div class="title"><%coupon.couponname%></div>
						<div class="usetime">
							<div class="text"><%coupon.timestr%></div>
						</div>
					</div>
					<div class="coupon-after">
						<div class="coupon-btn ling"
							 data-couponname="<%coupon.couponname%>"
							 data-couponid="<%coupon.id%>">立即领取</div>
					</div>
				</div>
				<%/each%>
			</div>
		</div>
		<div class="fui-navbar">
			<a class="nav-item btn btn-default btn-cancel" style="color: #666">关闭</a>
		</div>
	</div>
</script>

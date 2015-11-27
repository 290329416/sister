<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>中国电子商务协会质量促进工作委员会</title>
<link rel="stylesheet" type="text/css" href="/Public/home/css/index.css">
<script src="/Public/home/js/jquery-1.8.3.min.js"></script>
</head>
<body>
   <div class="top">
      <div class="lefttop">
       您好！欢迎来到中国电子商务协会质量促进工作委员会  
      </div>
      <div class="righttop">
         <ul>
           <li style="width:50px;"><a href="/Public/home/#">请登录</a></li><li><a href="/Public/home/#">会员服务</a></li><li><a href="/Public/home/#">服务热线</a></li><li><a href="/Public/home/#">网站导航</a></li>
         </ul>
      </div>
   </div>
   
   <div class="header">
      <div class="logo"><img src="/Public/home/images/logo.png" width="285" height="68"></div>
      <div class="search">
      <form action="" method="post">
      <input type="text" class="ytext" placeholder="请输入你要搜索的内容">
      <input type="submit" class="ysubmit" value="综合搜索">
      </form>
      </div>
        
      <div class="nav">
        <ul>
          <li><a href="/">电商咨询</a></li>
            <li><a href="/">服务大厅</a></li>
              <li  ><a href="/">电商资质查询</a></li>
                <li ><a href="/">在线申请评审</a></li>
                  <li><a href="<?php echo U('Message/index');?>">公众留言</a></li>
        </ul>
      </div> 
   </div>
   <script type="text/javascript">
    $( document).ready(function(e) {
      $(".listny dl dd a").click(function(e) {
          $( this).addClass("cli").siblings().removeClass("cli")
      });
  });
  </script>
      <div class="main">
         <div class="nowthat">
           <b>当前位置：</b>
           <a href="/">首页</a>
             &gt;&gt; 
           <a href="<?php echo U('Message/index');?>">公众留言</a>
         </div>
         <div class="listleft">
           <div class="listny">
             <dl>
               <dt><h2>通知公告</h2></dt>
               <dd>
                  <a href="/" class="cli">协会概况</a>  
                  <a href="/">分会简介</a>  
                  <a href="/">组织机构</a>  
                  <a href="<?php echo U('Message/index');?>">公众留言</a>  
               </dd>
             </dl>
           </div>
         </div>
         <div class="r3 fr">

          <div id="help_content" class="r748 fr">
            <h3><img width="27" height="27" src="http://images.koolearn.com/www09/class/help/013.gif"> 公众留言</h3>
            <div class="msg">您好，欢迎来到中国电子商务协会，请在此详细填写您所遇到的问题，并留下准确的Email地址和其他联系方式，我们的工作人员会尽快给您回复。(<span class="red">*</span>为必填内容)</div>
            <div class="ca_info" style="border:1px solid #CC0000;color:#000;text-align:center;width:660px;background:#FFE3D6;padding:10px 0;margin:10px auto;display:none"></div>
            <form method="post" id="myform" name="myform">
              <table class="zc">
               <tbody>
                <tr>
                 <th width="71"><span class="red">*</span>企业名称：</th>
                 <td width="529"><input type="text" name="prisename" class="inp2" style="width:180px;" value=""></td>
               </tr>
               <tr>
                 <th><span class="red">*</span>联系人：</th>
                 <td><input type="text" name="name" class="inp2" style="width:180px;" value=""></td>
                </tr>
                <tr>
                 <th><span class="red">*</span>电话：</th>
                 <td><input type="text" name="phone" class="inp2" style="width:180px;" value=""></td>
                </tr>
               <tr>
                 <th>联系地址：</th>
                 <td><input type="text" name="address" class="inp2" style="width:180px;" value=""></td>
               </tr>
               <tr>
                 <th><span class="red">*</span>E_mail：</th>
                 <td><input type="text" name="email" class="inp2" style="width:180px;" value="">
                  <span class="red">输入正确的Email以便回复</span></td>
                </tr>
                <tr>
                 <th><span class="red">*</span>留言内容：</th>
                 <td><span class="red">请详细描述您所遇到的问题</span>
                  <textarea name="message" class="inp2" id="brarea" style="width: 450px; height: 113px;"></textarea>
                  <input type="hidden" id="brtest" value=""></td>
                </tr>
                <tr>
                 <th>验证码：</th>
                 <td><input type="text" name="verifyCode" id="login_verifyCode" class="inp2" maxlength="4">
                  &nbsp;&nbsp;&nbsp; <img width="100" height="35" align="absmiddle" src="/Message/verify" class="m_b" id="img">&nbsp;&nbsp;&nbsp;<a target="_self" href="javascript:reloadVerifyCode('img');">刷新验证码</a></td>
                </tr>
                <tr>
                 <td>&nbsp;</td>
                 <td><input type="button"  value="" onclick="fuzhi()" class="btn2"></td>
               </tr>
             </tbody>
           </table>
         </form>
       </div>
        
      </div>


      </div>
   <div class="bottom">
      <div class="friedlink"><b>友情链接：</b><span>
      <marquee direction="up" height="15" width="940" onmouseout="this.start()" onmouseover="this.stop()" scrollAmount="1" scrollDelay="1">
        <?php if(is_array($links)): foreach($links as $key=>$link): ?><a href="http://<?php echo ($link["url"]); ?>"><?php echo ($link["name"]); ?></a><?php endforeach; endif; ?>
      </marquee></span></div>
      <div class="finally">
        <p><b>国家部委</b>&nbsp;&nbsp;   技术部 公安部 民政部 财政部 交通部 水利部 商务部 卫生部 工业和信息化部 劳动保障部 审计署 人民银行 国土资源部 国资委 发展委会 国家民委<br/>
<b>地方</b> <b>政府</b> &nbsp; 北京  河北 山西 广东 海南 江苏 浙江 安徽 山东 江西 福建 湖南 黑龙江 吉林 辽宁 陕西 甘肃 四川 云南 贵州 台湾 内蒙古 宁夏 新疆 广西
西藏 天津 重庆 香港 澳门<br/>
<b>新闻</b> <b>媒体</b>&nbsp;&nbsp;  新华网 人民网 央视网国际 光明网 国际在线 中国经济网 法制网 中国经营网 中国企业报 新传媒网 凤凰网 网易 搜狐网 腾讯网 新浪网 互联网周刊
</p>
      <p style="text-align:center;">版权所有：中国电子商务协会质量促进分会<br/>
 地址：北京市海淀区万寿路27号院 （国家工业和信息化部机关大院）邮编：100846
</p>
      </div>
   </div>
   <script>
    function fuzhi() {
      $(".ca_info").hide();
      if(GetCookie('message') == 1){
        $(".ca_info").show().html("禁止重复提交");return;
      }
      $.ajax({
        "url":"/Message/add",
        "type":"post",
        "data":$("#myform").serialize(),
        "success":function(data){
          if(!data){
            $(".ca_info").show().html("提交失败");
          }else if(data.result==0){
            $(".ca_info").show().html(data.msg);
          }else{
            $(".ca_info").show().html("提交成功");
            setCookie('message','1',60);
            $(".btn2").prop({disabled: true});
            alert("您的留言已经提交成功，我们会尽快给您邮件给您答复，感谢您的支持!");
          }
        },
        "async":false,
        'dataType':"json"
      });
    }
    function reloadVerifyCode(objId) {
    var obj = document.getElementById(objId);
    obj.src = "/Message/verify?d=" + new Date();
    } 
    function setCookie(name, value, expires, path, domain, secure){
      var liveDate = new Date();
      expires = new Date((new Date()).getTime() + expires * 2000);//按分钟
      document.cookie = name + "=" + escape (value) +
      ((expires) ? "; expires=" + expires : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
    }
    function GetCookie(sName){
      var aCookie = document.cookie.split("; ");
      for (var i=0; i < aCookie.length; i++){
        var aCrumb = aCookie[i].split("=");
        if (sName == aCrumb[0]) return unescape(aCrumb[1]);
      }
        return null;
    } 
   </script>
</body>
</html>
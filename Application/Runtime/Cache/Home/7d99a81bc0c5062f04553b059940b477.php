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
           <li style="width:50px;"><a href="/">请登录</a></li><li><a href="/">会员服务</a></li><li><a href="/">服务热线</a></li><li><a href="/">网站导航</a></li>
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
      <div class="main">
         <div class="nowthat">
           <b>当前位置：</b>
           <a href="/">首页</a>
             &gt;&gt; 
            <?php if(is_array($type)): foreach($type as $key=>$t): if($t['id'] == $new['pid']): ?><a href="/t_<?php echo ($t["namepath"]); ?>/"><?php echo ($t["name"]); ?></a><?php endif; endforeach; endif; ?>
            &gt;&gt;
           <?php echo ($new["title"]); ?>
         </div>
          <div class="article">
           
            <h2><?php echo ($new["title"]); ?></h2><br/>
            <span> 日期:<?php echo ($new["releasetime"]); ?> 　　<?php if(!empty($new["name"])): ?>发布人：<?php echo ($new["name"]); endif; ?> </span><br/>
           　　<?php echo ($new["content"]); ?> 
　         <a href='javascript:window.close();'>关闭窗口</a>
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
</body>
</html>
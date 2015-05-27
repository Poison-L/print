<?php 

?>

<h2><b><font color="#009999">演示控制纸张大小、打印方向、连续打印和位置基点:</font></b></h2>
<p>一般的打印是程序控制一个逻辑布局，在不同的打印纸张上打印出相应效果。</p>
<p>但有些打印业务需要固定纸张大小从而实现连续打印，此时可用如下控制函数：</p>
<p><font color="#0000FF" size="3">SET_PRINT_PAGESIZE(intOrient,intPageWidth,intPageHeight,strPageName);
</font></p>
<p><font size="3"><b>参数说明：</b></font><font color="#0000FF" size="3">
<br>
</font><font size="3"><font color="#0000FF">intOrient：</font>打印方向及纸张类型<font color="#0000FF"><br>
</font><font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>1---纵向打印，固定纸张；&nbsp;<br>
<font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>2---横向打印，固定纸张；&nbsp;&nbsp;<br>
<font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>3---纵向打印，宽度固定，高度按打印内容的高度自适应(见<a href="PrintSample18.html">样例18</a>)；<br>
<font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>0---方向不定，由操作者自行选择或按打印机缺省设置。<font color="#0000FF"><br>
</font><font color="#0000FF"><br>
intPageWidth：<br>
</font><font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>纸张宽，单位为0.1mm 譬如该参数值为45，则表示4.5mm,计量精度是0.1mm。</font></p>                                     
<p><font size="3"><font color="#0000FF">intPageHeight：</font><br>   
<font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>固定纸张时该参数是纸张高；高度自适应时该参数是纸张底边的空白高，计量单位与纸张宽一样。</font></p>         
<p><font color="#0000FF" size="3">   
strPageName：</font><font size="3"><br>   
</font><font size="3"><font color="#0000FF">&nbsp;&nbsp;&nbsp; </font>纸张类型名，       
<font color="#0000FF">intPageWidth</font><font size="3">等于零时本参数才有效，具体名称参见操作系统打印服务属性中的格式定义。<br>     
&nbsp;&nbsp;&nbsp; 关键字“CreateCustomPage”会在系统内建立一个名称为“LodopCustomPage”自定义纸张类型。<br>       
</font></p>      
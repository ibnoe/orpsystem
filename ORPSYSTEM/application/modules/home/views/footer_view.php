<div class=clear></div>  
</div>

             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js">
    </script>
    
    <script>
  window.jQuery||document.write('<script src="<?php echo base_url() ?>front_assets/dashboard/js/libs/jquery-1.7.1.min.js"><\/script>');
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js">
</script>

<script>
  window.jQuery.ui||document.write('<script src="<?php echo base_url() ?>front_assets/dashboard/js/libs/jquery-ui-1.8.16.min.js"><\/script>');
</script>

    <script defer src='<?php echo base_url() ?>front_assets/dashboard/js/23acda8.js'>
    </script>

    <script>
        $(window).load(function () {
            $("#accordion").accordion();
            $(window).resize()
        }
        );
    </script>

    <!--[if lt IE 7 ]>
    <script defer src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js">
    </script>
    
    <script defer>
    window.attachEvent("onload",function(){
    CFInstall.check({
    mode:"overlay"}
    )}
    );
    </script>
    <![endif]-->
    
    
    <script>
    $(window).load(function(){
      var a=[{
        label:"Europe (EU27)",data:[[1999,3],[2000,3.9],[2001,2],[2002,1.2],[2003,1.3],[2004,2.5],[2005,2],[2006,3.1],[2007,2.9],[2008,0.9]],bars:{
          barWidth:0.2,order:1,lineWidth:2}
      },{
        label:"Japan",data:[[1999,-0.1],[2000,2.9],[2001,0.2],[2002,0.3],[2003,1.4],[2004,2.7],[2005,1.9],[2006,2],[2007,2.3],[2008,-0.7]],bars:{
          barWidth:0.2,order:2,lineWidth:2}
      },{
        label:"USA",data:[[1999,4.4],[2000,3.7],[2001,0.8],[2002,1.6],[2003,2.5],[2004,3.6],[2005,2.9],[2006,2.8],[2007,2],[2008,1.1]],bars:{
          barWidth:0.2,order:3,lineWidth:2}
      }];
      $.plot($("#lines"),a,{
        grid:{
          hoverable:true}
      });
      $.plot($("#area"),a,{
        grid:{
          hoverable:true}
        ,series:{
          lines:{
            fill:true}
        }}
            );
      $.plot($("#bar"),a,{
        grid:{
          hoverable:true}
        ,series:{
          bars:{
            show:true}
        }}
            );
      $.plot($("#pie"),[{
        label:"Series1",data:10}
                        ,{
                          label:"Series2",data:30}
                        ,{
                          label:"Series3",data:90}
                        ,{
                          label:"Series4",data:70}
                        ,{
                          label:"Series5",data:80}
                        ,{
                          label:"Series6",data:110}
                       ],{
                         grid:{
                           hoverable:false}
                         ,series:{
                           pie:{
                             show:true,radius:1,label:{
                               show:true,radius:3/4,formatter:function(b,c){
                                 return'<div style="font-size:10pt;text-align:center;padding:2px;color:white;">'+b+"<br/>"+Math.round(c.percent)+"%</div>"}
                               ,background:{
                                 opacity:0.5}
                             }}
                         }}
            );
      $(".box").createTabs();
      $(window).resize()}
                  );
  </script>

</body>
</html>
<!-- Localized -->
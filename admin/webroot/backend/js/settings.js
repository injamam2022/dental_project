var siteurl=$("#js_url").val();
var admin_name=$("#admin_name").val();
var site_settings = '<div class="ts-button">'
        +'<span class="fa fa-cog fa-spin"></span>'
    +'</div>'
    +'<div class="ts-body">'
        +'<div class="ts-title">Options</div>'
        +'<div class="ts-row">'
            +'<label class="check" id="fixedhead"><input type="checkbox" class="icheckbox" id="st_head_fixed" name="st_head_fixed" value="1"/> Fixed Header</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check" id="fixedsidebar"><input type="checkbox" class="icheckbox" id="st_sb_fixed" name="st_sb_fixed" value="1" checked/> Fixed Sidebar</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="st_sb_scroll" value="1"/> Scroll Sidebar</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="st_sb_right" value="1"/> Right Sidebar</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="st_sb_custom" value="1"/> Custom Navigation</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" sct_name="st_sb_toggled" name="st_sb_toggled" value="1"/> Toggled Navigation</label>'
        +'</div>'
        +'<div class="ts-title">Layout</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="radio" class="iradio" name="st_layout_boxed" value="0" checked/> Full Width</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="radio" class="iradio" name="st_layout_boxed"  value="1"/> Boxed</label>'
        +'</div>'
        +'<div class="ts-title">Themes</div>'
        +'<div class="ts-themes">'
            +'<a href="#" class="active" id="theme-default" data-theme="'+siteurl+'/webroot/backend/css/theme-default.css"><img src="'+siteurl +'/webroot/backend/img/themes/default.jpg"/></a>'            
            +'<a href="#" id="theme-forest" data-theme="'+siteurl+'/webroot/backend/css/theme-forest.css"><img src="'+siteurl +'/webroot/backend/img/themes/forest.jpg"/></a>'
            +'<a href="#" id="theme-dark" data-theme="'+siteurl+'/webroot/backend/css/theme-dark.css"><img src="'+siteurl +'/webroot/backend/img/themes/dark.jpg"/></a>'                        
            +'<a href="#" id="theme-night" data-theme="'+siteurl+'/webroot/backend/css/theme-night.css"><img src="'+siteurl +'/webroot/backend/img/themes/night.jpg"/></a>'            
            +'<a href="#" id="theme-serenity" data-theme="'+siteurl+'/webroot/backend/css/theme-serenity.css"><img src="'+siteurl +'/webroot/backend/img/themes/serenity.jpg"/></a>'
            
            +'<a href="#" id="theme-default-head-light" data-theme="'+siteurl+'/webroot/backend/css/theme-default-head-light.css"><img src="'+siteurl+'/webroot/backend/img/themes/default-head-light.jpg"/></a>'
            +'<a href="#" id="theme-forest-head-light" data-theme="'+siteurl+'/webroot/backend/css/theme-forest-head-light.css"><img src="'+siteurl +'/webroot/backend/img/themes/forest-head-light.jpg"/></a>'    
            +'<a href="#" id="theme-dark-head-light" data-theme="'+siteurl+'/webroot/backend/css/theme-dark-head-light.css"><img src="'+siteurl +'/webroot/backend/img/themes/dark-head-light.jpg"/></a>'            
            +'<a href="#" id="theme-night-head-light" data-theme="'+siteurl+'/webroot/backend/css/theme-night-head-light.css"><img src="'+siteurl +'/webroot/backend/img/themes/night-head-light.jpg"/></a>'
            +'<a href="#" id="theme-serenity-head-light" data-theme="'+siteurl+'/webroot/backend/css/theme-serenity-head-light.css"><img src="'+siteurl+'/webroot/backend/img/themes/serenity-head-light.jpg"/></a>'

        +'</div>'
    +'</div>';
    
var settings_block = document.createElement('div');
    settings_block.className = "theme-settings";
    settings_block.innerHTML = site_settings;
    document.body.appendChild(settings_block);


	
$(document).ready(function(){
	
	var aj_head_fixed="";
		var aj_sb_fixed="";
        var aj_sb_scroll="";
        var aj_sb_right="";
        var aj_sb_custom="";
        var aj_sb_toggled="";
        var aj_layout_boxed= ""

		if(getCookie('st_head_fixed')==1)
		{
		      aj_head_fixed=1;
		} else {
			aj_head_fixed=0;
		}

		if(getCookie('st_sb_fixed')==1)
		{
		      aj_sb_fixed=1;
		} else {
			aj_sb_fixed=0;
		}
		
		if(getCookie('st_sb_scroll')==1)
		{
		      aj_sb_scroll=1;
		} else {
			aj_sb_scroll=0;
		}
		
		if(getCookie('st_sb_right')==1)
		{
		      aj_sb_right=1;
		} else {
			aj_sb_right=0;
		}


		if(getCookie('st_sb_custom')==1)
		{
		      aj_sb_custom=1;
		} else {
			aj_sb_custom=0;
		}
		
		if(getCookie('st_sb_toggled')==1)
		{
		      aj_sb_toggled=1;
		} else {
			aj_sb_toggled=0;
		}
		
		if(getCookie('st_layout_boxed')==1)
		{
		      aj_layout_boxed=1;
		} else {
			aj_layout_boxed=0;
		}

    /* Default settings */
    var theme_settings = {
        st_head_fixed:aj_head_fixed,
        st_sb_fixed: aj_sb_fixed,
        st_sb_scroll: aj_sb_scroll,
        st_sb_right:aj_sb_right,
        st_sb_custom: aj_sb_custom,
        st_sb_toggled:aj_sb_toggled,
        st_layout_boxed: aj_layout_boxed
    };
    /* End Default settings */
    
    set_settings(theme_settings,false);    
    
    $(".theme-settings input").on("ifClicked",function(){
        
        var input   = $(this);

        if(input.attr("name") != 'st_layout_boxed'){
           
            if(!input.prop("checked")){
                theme_settings[input.attr("name")] = input.val();
				setCookie(input.attr("name"),input.val(),30)
				if(input.attr("name")=="st_sb_toggled")
				{
					setCookie("sct_aj_toggle","st_sb_toggled",30)
					$("#logoclass").html("");
				}
				
            }else{            
                theme_settings[input.attr("name")] = 0;
				setCookie(input.attr("name"),0,30)
				if(input.attr("name")=="st_sb_toggled")
				{
					setCookie("sct_aj_toggle","",30)
					$(".page-container").removeClass("page-navigation-toggled");
                    $(".x-navigation-minimize").trigger("click");
					 $("#logoclass").html(admin_name);
				}
            }
            
        }else{
            theme_settings[input.attr("name")] = input.val();
			setCookie(input.attr("name"),input.val(),30)
        }

        /* Rules */
        if(input.attr("name") === 'st_sb_fixed'){
            if(theme_settings.st_sb_fixed == 1){
                theme_settings.st_sb_scroll = 1;
				setCookie("st_sb_scroll",1,30)
            }else{
                theme_settings.st_sb_scroll = 0;
				setCookie("st_sb_scroll",0,30)

            }
        }
        
        if(input.attr("name") === 'st_sb_scroll'){
            if(theme_settings.st_sb_scroll == 1 && theme_settings.st_layout_boxed == 0){
                theme_settings.st_sb_fixed = 1;
				setCookie("st_sb_fixed",1,30)
            }else if(theme_settings.st_sb_scroll == 1 && theme_settings.st_layout_boxed == 1){
                theme_settings.st_sb_fixed = -1;
				setCookie("st_sb_fixed",-1,30)
						
            }else if(theme_settings.st_sb_scroll == 0 && theme_settings.st_layout_boxed == 1){
                theme_settings.st_sb_fixed = -1;
				setCookie("st_sb_fixed",-1,30)
            }else{
                theme_settings.st_sb_fixed = 0;
				setCookie("st_sb_fixed",0,30)
            }
        }
        
        if(input.attr("name") === 'st_layout_boxed'){
            if(theme_settings.st_layout_boxed == 1){                
                theme_settings.st_head_fixed    = -1;
                theme_settings.st_sb_fixed      = -1;
                theme_settings.st_sb_scroll     = 1;
				setCookie("st_head_fixed",-1,30)
				setCookie("st_sb_fixed",-1,30)
				setCookie("st_sb_scroll",1,30)
            }else{
                theme_settings.st_head_fixed    = 0;
                theme_settings.st_sb_fixed      = 1;
                theme_settings.st_sb_scroll     = 1;
				setCookie("st_head_fixed",0,30)
				setCookie("st_sb_fixed",1,30)
				setCookie("st_sb_scroll",1,30)
				
            }
        }
        /* End Rules */
        
        set_settings(theme_settings,input.attr("name"));
    });
    
    /* Change Theme */
    $(".ts-themes a").click(function(){
		setCookie("themes_name_id",$(this).attr('id'),30)
		setCookie("themes",$(this).data("theme"),30)
        $(".ts-themes a").removeClass("active");
        $(this).addClass("active");
        $("#theme").attr("href",$(this).data("theme"));
		
        return false;
    });
    /* END Change Theme */
    
    /* Open/Hide Settings */
    $(".ts-button").on("click",function(){
        $(".theme-settings").toggleClass("active");
    });
    /* End open/hide settings */
});

function set_settings(theme_settings,option){
    /* Start Header Fixed */
      if(theme_settings.st_head_fixed == 1)
        $(".page-container").addClass("page-navigation-top-fixed");
    else
        $(".page-container").removeClass("page-navigation-top-fixed");    
    /* END Header Fixed */
    
    /* Start Sidebar Fixed */
    if(theme_settings.st_sb_fixed == 1){        
        $(".page-sidebar").addClass("page-sidebar-fixed");
    }else
        $(".page-sidebar").removeClass("page-sidebar-fixed");
    /* END Sidebar Fixed */
    
    /* Start Sidebar Fixed */
    if(theme_settings.st_sb_scroll == 1){          
        $(".page-sidebar").addClass("scroll").mCustomScrollbar("update");        
    }else
        $(".page-sidebar").removeClass("scroll").css("height","").mCustomScrollbar("disable",true);
    
    /* END Sidebar Fixed */
    
    /* Start Right Sidebar */
    if(theme_settings.st_sb_right == 1)
        $(".page-container").addClass("page-mode-rtl");
    else
        $(".page-container").removeClass("page-mode-rtl");
    /* END Right Sidebar */
    
    /* Start Custom Sidebar */
    if(theme_settings.st_sb_custom == 1) {
	$(".page-sidebar .x-navigation").addClass("x-navigation-custom"); }
    else {
	$(".page-sidebar .x-navigation").removeClass("x-navigation-custom"); }
    /* END Custom Sidebar */
    
    /* Start Toggled Sidebar */
        if(getCookie('sct_aj_toggle')==="st_sb_toggled"){
        if(theme_settings.st_sb_toggled == 1){
            $(".page-container").addClass("page-navigation-toggled");
            $(".x-navigation-minimize").trigger("click");
			 $("#logoclass").html("");
        }else{          
            $(".page-container").removeClass("page-navigation-toggled");
            $(".x-navigation-minimize").trigger("click");
			
        }
		} else{
			
			
		}
    /* END Toggled Sidebar */
    
    /* Start Layout Boxed */
    if(theme_settings.st_layout_boxed == 1)
        $("body").addClass("page-container-boxed");
    else
        $("body").removeClass("page-container-boxed");
    /* END Layout Boxed */
    
    /* Set states for options */
    if(option === false || option === 'st_layout_boxed' || option === 'st_sb_fixed' || option === 'st_sb_scroll'){        
        for(option in theme_settings){
            set_settings_checkbox(option,theme_settings[option]);
        }
    }
    /* End states for options */
    
    /* Call resize window */
    $(window).resize();
    /* End call resize window */
}

function set_settings_checkbox(name,value){

    if(name == 'st_layout_boxed'){    
        
        $(".theme-settings").find("input[name="+name+"]").prop("checked",false).parent("div").removeClass("checked");
        
        var input = $(".theme-settings").find("input[name="+name+"][value="+value+"]");
                
        input.prop("checked",true);
        input.parent("div").addClass("checked");        
        
    }else{
        
        var input = $(".theme-settings").find("input[name="+name+"]");
        
        input.prop("disabled",false);            
        input.parent("div").removeClass("disabled").parent(".check").removeClass("disabled");        
        
        if(value === 1){
            input.prop("checked",true);
            input.parent("div").addClass("checked");
        }
        if(value === 0){
            input.prop("checked",false);            
            input.parent("div").removeClass("checked");            
        }
        if(value === -1){
            input.prop("checked",false);            
            input.parent("div").removeClass("checked");
            input.prop("disabled",true);            
            input.parent("div").addClass("disabled").parent(".check").addClass("disabled");
        }        
                
    }
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

	
$(document).ready(function(){
	
   if(getCookie('st_layout_boxed')==1) {
	    
		$("#fixedhead").addClass("disabled");
		$("#fixedsidebar").addClass("disabled");
		$("#st_head_fixed").prop("disabled",true);
		$("#st_sb_fixed").prop("disabled",true);
		

   }
   
    if(getCookie('themes')!=="") {
        $(".ts-themes a").removeClass("active");
		 var activePage = getCookie('themes').substring(getCookie('themes').lastIndexOf('/') + 1);
		 if(activePage==getCookie('themes_name_id')+".css")
		 {
			   $("#"+getCookie('themes_name_id')).addClass("active");
		 }
        $("#theme").attr("href",getCookie('themes'));
		
		
	}	
   
});


	
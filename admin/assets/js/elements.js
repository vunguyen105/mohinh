jQuery(document).ready(function(){
    
        if(jQuery('.confirmbutton').length > 0) {
		jQuery('.confirmbutton').click(function(){
                    
			jConfirm(' Bạn chắc chắn làm điều này?', 'Thông báo', function(r) {
                                if(r == true)
                                    var a = 'đã';
                                else 
                                    var a = 'chưa';
				jAlert('Bạn ' + a + ' thực hiện điều này', 'Thông báo');
			});
		});
	}
        
        
        if(jQuery('.alertboxbutton').length > 0) {
		jQuery('.alertboxbutton').click(function(){
                        //jQuery.alerts.dialogClass = 'customStyle';
			jAlert('This is a custom alert box', 'Alert Dialog', function(){
                           //jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}	
	// promptbox
	if(jQuery('.promptbutton').length > 0) {
		jQuery('.promptbutton').click
		(function(){
			jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
				if( r ) alert('You entered ' + r);
			});
		});
	}
	
	// alert with html
	if(jQuery('.alerthtmlbutton').length > 0) {
		jQuery('.alerthtmlbutton').click(function(){
			jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
		});
	}
        
        // alert danger
        if(jQuery('.alertdanger').length > 0) {
		jQuery('.alertdanger').click(function(){
                        jQuery.alerts.dialogClass = 'alert-danger';
			jAlert('This is a custom alert box for danger', 'Alert Danger', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert warning
        if(jQuery('.alertwarning').length > 0) {
		jQuery('.alertwarning').click(function(){
                        jQuery.alerts.dialogClass = 'alert-warning';
			jAlert('This is a custom alert box for warning', 'Alert Warning', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert success
        if(jQuery('.alertsuccess').length > 0) {
		jQuery('.alertsuccess').click(function(){
                        jQuery.alerts.dialogClass = 'alert-success';
			jAlert('This is a custom alert box for success', 'Alert Success', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert info
        if(jQuery('.alertinfo').length > 0) {
		jQuery('.alertinfo').click(function(){
                        jQuery.alerts.dialogClass = 'alert-info';
			jAlert('This is a custom alert box for info', 'Alert Info', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert inverse
        if(jQuery('.alertinverse').length > 0) {
		jQuery('.alertinverse').click(function(){
                        jQuery.alerts.dialogClass = 'alert-inverse';
			jAlert('This is a custom alert box for inverse', 'Alert Inverse', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}

});
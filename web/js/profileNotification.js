function toggleProfileNotification(height){
	//var height = 90;
	if( $("#profileNotificationHandle").css('bottom') == height+"px" ) { 
		$("#profileNotificationHandle").animate({ bottom: '30' }, 'slow' );
		$("#profileNotifications").animate({ bottom: '-'+height }, 'slow' );
   } else {
   	$("#profileNotificationHandle").animate({ bottom: height }, 'slow' );
      $("#profileNotifications").animate({ bottom: 0 }, 'slow' );
   }
}
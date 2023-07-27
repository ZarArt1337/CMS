
// VIEW ALL POST CHECKBOXES
$(document).ready(function(){
  $('#selectAllBoxes').click(function(){
    if(this.checked) {
      $('.checkBoxes').each(function(){
        this.checked = true;
      });
    } else {
      $('.checkBoxes').each(function(){
        this.checked = true;
      });
    }
  });
});

//USERS ONLINE REFRESHING
function loadUsersOnline() {
	$.get("functions.php?onlineusers=result", function(data){
		$(".usersonline").text(data);
	});
}
setInterval(function(){
	loadUsersOnline();
},500);



$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });
});
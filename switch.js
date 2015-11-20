//Experimental code for switch mode
/* $('.switch').bootstrapSwitch('state', false);


$('#CheckBoxValue').text($("#TheCheckBox").bootstrapSwitch('state'));

$('#TheCheckBox').on('switchChange.bootstrapSwitch', function () {

    $("#CheckBoxValue").text($('#TheCheckBox').bootstrapSwitch('state'));
});

$('.probeProbe').bootstrapSwitch('state', true);

$('.probeProbe').on('switchChange.bootstrapSwitch', function (event, state) {

    alert(this);
    alert(event);
    alert(state);
});

*/

$('#schedule-0').on('click', function() {
    $('#scheduleModal').modal('toggle');
}); 

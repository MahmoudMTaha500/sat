// Date Picker
$('.datepicker').datepicker({
   beforeShowDay: function(date){ 
  var day = date.getDay(); 
  return [day == 1 || day == 4,""];
}
});
// Credit
$('.credit').datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});

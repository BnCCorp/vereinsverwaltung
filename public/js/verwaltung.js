// Bei einer Barkasse darf keine IBAN/Email existieren
function checkBarkasse() {
    console.log($('#new-account-type').val() == "Barkasse")
    // console.log("$('#new-account-type :selected').text(): " + $('#new-account-type :selected').text())
    if($('#new-account-type').val() == ('Barkasse')){
        $("#new-iban").prop('disabled', true);
        $("#new-iban").val('')
    } else {
        $("#new-iban").prop('disabled', false);
    }
}
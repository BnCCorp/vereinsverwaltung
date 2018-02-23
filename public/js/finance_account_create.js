function accountTypeChanged() {
    if($('#account-type').val() != ('Girokonto') && $('#account-type').val() != ('Onlinekonto')) {
        $("#address-label").hide();
        $("#address-input").hide();
        $("#address-input").val('');
    } else if ($('#account-type').val() == 'Girokonto') {
        $("#address-label").show();
        $("#address-input").show();
        $("#address-label").html('IBAN');
    } else if ($('#account-type').val() == 'Onlinekonto') {
        $("#address-label").show();
        $("#address-input").show();
        $("#address-label").html('Email');
    }
}

$(document).ready(function() {
    // hide address fields on load
    $("#address-label").hide();
    $("#address-input").hide();
    $("#address-input").val('');
});
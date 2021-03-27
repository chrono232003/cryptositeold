//validation Framework V1.1
var expr = {
	  alpha: {"rule":/^[a-zA-Z ]*$/, "message": "Please make sure you are using letters only."},
	  alphaNumeric: {"rule":/^[a-zA-Z\d ]+$/, "message": "Please make sure you are using letter or numbers only."},
	  numeric: {"rule":/^\d+$/, "message": "Please make sure you are using numbers only./n"},
	  ssn: {"rule":/^(?!666|000|9\d{2})\d{3}-(?!00)\d{2}-(?!0{4})\d{4}$|^(?!666|000|9\d{2})\d{3}(?!00)\d{2}(?!0{4})\d{4}$/, "message": "Please make sure you are entering a valid ssn."},
	  phone: {"rule":/^\(*[-. /]*\(*[2-9]\d{2}\)*[-. ]*\d{3}[-. /]*\d{4}$/, "message": "Please make sure you are entering a valid phone number."},
	  date: {"rule":/^((0[13578]|10|12)(-|\/|\.)?((0[1-9])|([12])([0-9])|(3[01]))(-|\/|\.)?((18)([0-9])(\d{1})|(19)([0-9])(\d{1})|(2)([01])([0-9])(\d{1}))|(0[2469]|11)(-|\/|\.)?((0[1-9])|([12])([0-9])|(3[0]))(-|\/|\.)?((18)([0-9])(\d{1})|(19)([0-9])(\d{1})|(2)([01])([0-9])(\d{1})))$/, "message": "Please make sure you are entering a valid date."},
	  email: {"rule":/^((([A-Za-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([A-Za-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([A-Za-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([A-Za-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([A-Za-z]|\d|-|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([A-Za-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([A-Za-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+|(([A-Za-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+([A-Za-z]+|\d|-|\.{0,1}|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])?([A-Za-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/, "message": "Please make sure you are entering a valid email."},
	  pobox: {"rule":/("(post\s*(office)?)?\s*b(?:[o0]x)?\s*[#-]?\s*(\d+)?"|"[\w\s]*?p(ost)?\s*[.-]?\s*o?\s*\.?\s*b(?:[o0]x)?\.?\s*(\d+)?"|"\s*number\s*\d+")|^(?:Post(?:al)? (?:Office )?|P[. ]?O\.? )?b(?:[o0]x)?|b[o0]x\b/gim, "message": "PO Boxes are not allowed"}
};

function exprTest(input, expType) {
	var regex = new RegExp(expType.rule);
    return (regex.test(input)) ? true : expType.message;	
}

function formatPhone(phone) {
  	var stripPhone = phone.replace(/[^0-9.]/g, "");
    return exprTest(testString, expr.phone) ? "(" + stripPhone.substring(0,3) + ") " + stripPhone.substring(3,6) + " - " + stripPhone.substring(6) : phone + " is not a proper phone number.";
}

function formatSSN(SSN) {
	var stripSSN = SSN.replace(/[^0-9.]/g, "");
	return exprTest(testString, expr.ssn) ? stripSSN.substring(0,3) + " - " + stripSSN.substring(3,5) + " - " + stripSSN.substring(5) : SSN + " is not a proper SSN number.";
}
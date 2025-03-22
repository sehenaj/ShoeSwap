function validateFormnow() {
    // Validate Cardholder's Name
    var nameInput = document.getElementById("typeName");
    var name = nameInput.value.trim();
  
    // Only allow alphabetic characters and spaces in the name
    var namePattern = /^[A-Za-z ]+$/;
    if (!namePattern.test(name)) {
      alert("Please enter a valid cardholder's name. Only alphabetic characters and spaces are allowed.");
      nameInput.focus();
      return false;
    }
  
    // Validate Card Number
    var cardNumberInput = document.getElementById("typeText");
    var cardNumber = cardNumberInput.value.trim();
  
    // Only allow numeric characters in the card number
    var cardNumberPattern = /^[0-9]+$/;
    if (!cardNumberPattern.test(cardNumber)) {
      alert("Please enter a valid card number. Only numeric characters are allowed.");
      cardNumberInput.focus();
      return false;
    }
  
    // Validate CVV
    var cvvInput = document.getElementById("typeCVV");
    var cvv = cvvInput.value.trim();
  
    // Only allow numeric characters in the CVV
    if (!cardNumberPattern.test(cvv)) {
      alert("Please enter a valid CVV. Only numeric characters are allowed.");
      cvvInput.focus();
      return false;
    }
  
    // Validate Expiration
    var expirationInput = document.getElementById("typeExp");
    var expiration = expirationInput.value.trim();
  
    // Only allow numeric characters and '/' in the expiration
    var expirationPattern = /^[0-9\/]+$/;
    if (!expirationPattern.test(expiration)) {
      alert("Please enter a valid expiration date. Only numeric characters and '/' are allowed.");
      expirationInput.focus();
      return false;
    }
  
    // Automatically add '/' after two digits in the expiration
    if (expiration.length === 2) {
      expirationInput.value = expiration + '/';
    }
  
    return true; // Form submission will proceed if all validations pass
  }
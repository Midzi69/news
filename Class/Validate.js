class Validate {
     validate() {
        let x = document.forms['categoryform']['category'].value;
        if(x == ""){
            alert(`category Must be filled out`);
            return false;
        }
    }
}
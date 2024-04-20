

    function updateValue() {

    console.log("hii");

    var selectedKey = document.getElementById("keySelection").value;
    console.log(selectedKey);
    // var selectedValue = "<?php echo isset($_COOKIE[selectedKey]) ? $_COOKIE[selectedKey] : ''; ?>";
    // console.log(selectedValue);
    // document.getElementById("value").innerHTML = selectedValue;
   const output= document.getElementById('value');
   output.innerHTML=selectedKey;

} 


// function updateValue() {
//     console.log(hii);
//     var selectedKey = document.getElementById("keySelection").value;
//     var selectedValue = "<?php echo isset($_COOKIE[selectedKey]) ? $_COOKIE[selectedKey] : ''; ?>";
//     document.getElementById("value").innerHTML = selectedValue;
// }

// function updateValue() {
//     console.log(hii);
//     var selectedKey = document.getElementById("keySelection").value;
//     var selectedValue = "<?php echo isset($_COOKIE[selectedKey]) ? $_COOKIE[selectedKey] : ''; ?>";
//     document.getElementById("value").innerHTML = selectedValue;
// }


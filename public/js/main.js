let costSelect = document.querySelectorAll("#costValues #costSelect");
let costInput = document.querySelectorAll("#costValues #costinput");
let taxinputCost = document.querySelector("#taxinputCost");


let calulateValues = () => {
    let selectValue = JSON.parse(costSelect[0].value);
    let developerRate = selectValue[1];
    let unitCost = costInput[0].value;
    commisionCost = +unitCost * (developerRate / 100);
    costInput[1].value = +commisionCost;
    let tax = costInput[2].value;
    let TaxCost = +commisionCost * (+tax / 100);
    taxinputCost.value=  +TaxCost;
    costInput[3].value = +commisionCost - +TaxCost ;
}

for (let i = 0; i < costSelect.length; i++) {


    costSelect[i].addEventListener("change", calulateValues)

}


for (let i = 0; i < costInput.length; i++) {


    costInput[i].addEventListener("keyup", calulateValues)

}


function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

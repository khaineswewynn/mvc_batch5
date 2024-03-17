let addButton=document.querySelector('.btnAdd')
console.log(addButton)
addButton.onclick=addRow 
let div_invoice=document.querySelector('.invoice')
let btnSubmit=document.querySelector('.btnSubmit')
btnSubmit.onclick=formSubmit

let subtotal1=document.querySelector('.subtotal')
subtotal1.onfocus=calculateSubTotal

let total=document.querySelector('.total')
total.onfocus=calculateTotal
let total_value=0;

let amount=document.querySelector('.amount')
amount.onfocus=calculateAmount

let amount_value=0

function calculateTotal()
{
    total_value=0;
    let price_elements=document.querySelectorAll('.price')    
    let prices=[];
       
    let title_elements=document.querySelectorAll('.title')
    let titles=[]

    let qty_elements=document.querySelectorAll('.qty')
    let qty=[]
    for(let index=0;index<price_elements.length;index++)
    {
        prices[index]=price_elements[index].value
        titles[index]=title_elements[index].value
        qty[index]=qty_elements[index].value
        total_value+= prices[index]*qty[index]

    }
    total.value=total_value

}

function calculateAmount(){
    let discount=document.querySelector('.discount').value
    amount_value=total_value-discount
    amount.value=amount_value
}
function addRow()
{ 
    let div_row=document.createElement('div')
    console.log(div_row)
    div_row.classList.add('row')
    div_row.classList.add('m-3')

    let div_col1=document.createElement('div')
    div_col1.classList.add('col-md-3')
    let product=document.createElement('input')
    product.setAttribute('type','text')
    product.setAttribute('name','product[]')
    product.classList.add('form-control')
    product.classList.add('title')
    div_col1.appendChild(product)
    console.log(div_col1)

    let div_col2=document.createElement('div')
    div_col2.classList.add('col-md-2')
    let price=document.createElement('input')
    price.setAttribute('type','text')
    price.setAttribute('name','price[]')
    price.classList.add('price')
    price.classList.add('form-control')
    div_col2.appendChild(price)
    console.log(div_col2)

    let div_col3=document.createElement('div')
    div_col3.classList.add('col-md-2')
    let qty=document.createElement('input')
    qty.setAttribute('type','text')
    qty.setAttribute('name','qty[]')
    qty.classList.add('qty')
    qty.classList.add('form-control')
    div_col3.appendChild(qty)

    let div_col4=document.createElement('div')
    div_col4.classList.add('col-md-2')
    let subtotal=document.createElement('input')
    subtotal.setAttribute('type','text')
    subtotal.setAttribute('name','subtotal[]')
    subtotal.classList.add('subtotal')
    subtotal.classList.add('form-control')
    div_col4.appendChild(subtotal)
    subtotal.onfocus=calculateSubTotal

    let div_col5=document.createElement('div')
    div_col5.classList.add('col-md-2')
    let btnDelete=document.createElement('button')
    btnDelete.classList.add('btn')
    btnDelete.classList.add('btn-danger')
    btnDelete.innerHTML="X"
    btnDelete.classList.add('delete')
    btnDelete.onclick=deleteRow
    div_col5.appendChild(btnDelete)

    div_row.appendChild(div_col1)
    div_row.appendChild(div_col2)
    div_row.appendChild(div_col3)
    div_row.appendChild(div_col4)
    div_row.appendChild(div_col5)

    div_invoice.appendChild(div_row)
    
    // let subtotal_elements=document.querySelectorAll('.subtotal')
    // console.log(subtotal_elements)
    

}

function deleteRow(event)
{
event.preventDefault()
console.log(event.target.parentElement.parentElement)
div_invoice.removeChild(event.target.parentElement.parentElement)
}

function formSubmit(event)
{
    event.preventDefault();
    let price_elements=document.querySelectorAll('.price')    
    let prices=[];
       
    let title_elements=document.querySelectorAll('.title')
    let titles=[]

    let qty_elements=document.querySelectorAll('.qty')
    let qty=[]
    
    let customer=document.querySelector('.cname').value
    let date=document.querySelector('.date').value
    for(let index=0;index<price_elements.length;index++)
    {
        prices[index]=price_elements[index].value
        titles[index]=title_elements[index].value
        qty[index]=qty_elements[index].value
    }
    $.ajax({
        url:'add_invoice.php',
        method:'post',
        data:{price:prices,title:titles,qty:qty,customer:customer,date:date},
        success:function(response){
            console.log(response)
           if(response=="success")
           {
            alert("added invoice to list")
           document.querySelector('#invoiceForm').reset()
           }
        }
    })
       
}

function calculateSubTotal(event)
{
    console.log(event.target)
    let div_qty=event.target.parentElement.previousElementSibling
    let qty=div_qty.firstElementChild.value

    let div_price=div_qty.previousElementSibling
    let price=div_price.firstElementChild.value
    // let price=qty.previousElement.value
    console.log(`qty : ${qty} , price ${price}`)
    event.target.value=qty*price
}
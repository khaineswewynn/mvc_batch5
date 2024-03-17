const filter=document.querySelector('#filter');
const min_salary=document.querySelector('#min_salary')
const max_salary=document.querySelector('#max_salary')


document.addEventListener('click',function(){
let btn=event.target;
let parent=btn.parentElement.parentElement
let id=parent.getAttribute('id')
$.ajax({
    method:'post',
    url:'verify.php',
    data:{id:id},
    success:function(response)
    {
        if(response=="success")
            alert("Verification is successful")
        else
            alert("Fail to verify.Try again!")
    }
})
})


// filter.addEventListener('click',function(event){
//     event.preventDefault();
//     let min_value=min_salary.value
//     let max_value=max_salary.value
//     console.log(min_value)
//     $.ajax({
//         method:'post',
//         url:'filter.php',
//         data:{min:min_value,max:max_value},
//         success:function(response)
//         {           
//             let tbody=$("#data-body")
//             tbody.empty().append(response);
            
//         }
//     })
// })
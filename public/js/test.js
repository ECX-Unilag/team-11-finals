async function showData(){
    const res = await fetch('/api/cart');
    const data = await res.json();
   
    console.log(data);

    data.forEach(function(cart,index) {    
        console.log(cart.price);
    });
}
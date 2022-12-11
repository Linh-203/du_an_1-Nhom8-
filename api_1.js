var data = [];
 var tinh = document.querySelector("#province")
 var huyen = document.querySelector("#district")
 var xa = document.querySelector("#ward")
async function fetchAPI(){
  const option = {
    method: "GET",
  }
  const result = await fetch("https://provinces.open-api.vn/api/?depth=3",option).then(res => res.json())
 data = result;

 tinh.innerHTML += `<option disabled value="">Chọn tỉnh/thành phố</option>`;
 huyen.innerHTML += `<option disabled value="">Chọn quận/huyện</option>`;
 xa.innerHTML += `<option disabled value="">Chọn phường/xã</option>`;
 for( let value of data){
  // tinh.innerHTML+=`<option value="${value.code}">${value.name}</option>`
  for(let quan of value.districts){
    // huyen.innerHTML+=`<option value="${quan.code}">${quan.name}</option>`
    for(let phuong of quan.wards){
     xa.innerHTML+=`<option value="${phuong.code}">${phuong.name}</option>`
   }
  }
 }
 
 
}
fetchAPI();
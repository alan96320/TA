// fuction untuk toogle / slide menu
function closeSlideMenu(){
  // document.getElementById('side-menu').style.width = '200px';
  // document.getElementById('atas').style.marginLeft = '200px';
  // document.getElementById('isi').style.marginLeft = '200px';
  // document.getElementById('bawah').style.marginLeft = '200px';
  // document.getElementById('toogle-open').style.display = 'block';
  // document.getElementById('toogle-close').style.display = 'none';
}
function openSlideMenu(){
  // document.getElementById('side-menu').style.width = '0';
  document.getElementById('slide').animate({left: '200px'});
  // document.getElementById('isi').style.marginLeft = '0';
  // document.getElementById('bawah').style.marginLeft = '0';
  // document.getElementById('toogle-open').style.display = 'none';
  // document.getElementById('toogle-close').style.display = 'block';
}
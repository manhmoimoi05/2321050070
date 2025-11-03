let danhSachPhim = [
  {
    id: 1,
    tenPhim: "Cám",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Việt Nam",
    poster: "../phim/cam.jpg",
    theLoai: "Phim Chiếu Rạp",
  },
  {
    id: 2,
    tenPhim: "Conan",
    namPhatHanh: 2025,
    tuoi: 14,
    thoiLuong: 2,
    quocGia: "Nhật Bản",
    poster: "../phim/conan.jpg",
    theLoai: "Phim Chiếu Rạp",
  },
];

const banner = document.querySelector(".adv__2");

function chonPhim(idPhim) {
  for (let index = 0; index < danhSachPhim.length; index++) {
    if (idPhim == danhSachPhim[index].id) {
      banner.src = danhSachPhim[index].poster;
      const text = document.querySelector(".text__adv__2")
      text.innerHTML = danhSachPhim[index].tenPhim
    }
  }
}

const phimMoi1 = document.querySelector(".conan__2");
phimMoi1.addEventListener("click", function (e) {
  e.preventDefault();
  chonPhim(2);

});

const phimMoi2 = document.querySelector(".cam__1");
phimMoi2.addEventListener("click", function (e) {
  e.preventDefault();
  chonPhim(1);
});

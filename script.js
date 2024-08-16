// Modal
//https://youtu.be/dPLHi7tsoFU?si=0q54HSg020ncNnJF
document.addEventListener("DOMContentLoaded", (event) => {
	if (document.getElementsByClassName("accordion")) {
		let acc = document.getElementsByClassName("accordion");
		for (let i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function () {
				this.classList.toggle("active");

				/* Toggle between hiding and showing the active panel */
				let panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}
	}

	if (document.querySelector(".btn-bars")) {
		const btnBars = document.querySelector(".btn-bars");
		btnBars.addEventListener("click", () => {
			btnBars.parentElement.parentElement.parentElement.classList.toggle(
				"show"
			);
		});
	}

	if (
		document.querySelector(".btn-src") ||
		document.querySelector(".floating-src")
	) {
		const btnSrc = document.querySelector(".btn-src");
		const boxSrc = document.querySelector(".floating-src");
		btnSrc.addEventListener("click", () => {
			boxSrc.classList.toggle("show");
		});
	}

	if (document.querySelector(".vp")) {
		const allVp = document.querySelectorAll(".vp");

		allVp.forEach((vp) => {
			vp.addEventListener("click", (el) => {
				const currVp = document.querySelector(".vp.check");
				if (currVp && currVp !== vp) {
					currVp.classList.toggle("check");
				}
				vp.classList.toggle("check");
			});
		});
	}

	if (document.querySelector(".payment")) {
		const allPayment = document.querySelectorAll(".payment");

		allPayment.forEach((pay) => {
			pay.addEventListener("click", (el) => {
				const currPay = document.querySelector(".payment.check");
				if (currPay && currPay !== pay) {
					currPay.classList.toggle("check");
				}
				pay.classList.toggle("check");
			});
		});
	}

	if (document.querySelector("#btn-checkout-toko")) {
		const btnCheckOut = document.querySelector(".btn-checkout");
		btnCheckOut.addEventListener("click", () => {
			Swal.fire({
				title: "Success",
				text: "Terimakasih",
				icon: "success",
			});
		});
	}

	if (document.getElementById("modalAgent")) {
		const modalAgent = document.getElementById("modalAgent");
		const openModalBtn = document.getElementById("openAgent");
		const closeModalBtn = document.getElementById("closeModalBtn");
		const btnPilih = modalAgent.querySelector(".btn-pilih-agent");

		openModalBtn.onclick = function () {
			modalAgent.style.display = "flex";
		};

		closeModalBtn.onclick = function () {
			modalAgent.style.display = "none";
		};

		btnPilih.onclick = function () {
			modalAgent.style.display = "none";
		};

		window.onclick = function (event) {
			if (event.target == modalAgent) {
				modalAgent.style.display = "none";
			}
		};
	}

  // Ganti Gambar Rank Awal
	if (document.querySelector("select#rank-awal")) {
		const selectRankAwal = document.querySelector("select#rank-awal");
		const imgRank = document.querySelector("img#rank-awal");

		selectRankAwal.addEventListener("change", () => {
			const rankVal = selectRankAwal.value;
			imgRank.src = `img/rank/${rankVal}3.png`;
			localStorage.setItem("rank-awal", rankVal);
		});
	}

  // Ganti Gambar Rank Akhir
	if (document.querySelector("select#rank-tujuan")) {
		const selectRankTujuan = document.querySelector("select#rank-tujuan");
		const imgRank = document.querySelector("img#rank-tujuan");

		selectRankTujuan.addEventListener("change", () => {
			const rankVal = selectRankTujuan.value;
			imgRank.src = `img/rank/${rankVal}3.png`;
			localStorage.setItem("rank-tujuan", rankVal);
		});
	}

	if (document.getElementById("modalCheckOut")) {
		const modalCheckOut = document.getElementById("modalCheckOut");
		const openModalBtn = document.getElementById("btn-checkout-joki");
		const closeModalBtn = document.querySelector("#modalCheckOut #closeModalBtn");
    const btnOrder = document.querySelector(".btn-buat-order");
    const imgRankAwal = document.querySelector("#modal-img-rank-awal");
    const imgRankTujuan = document.querySelector("#modal-img-rank-tujuan");

		openModalBtn.onclick = function () {
      modalCheckOut.style.display = "flex";
      const valRankAwal = (localStorage.getItem("rank-awal") != null) ? localStorage.getItem("rank-awal") : "iron";
			const valRankTujuan = (localStorage.getItem("rank-tujuan") != null) ? localStorage.getItem("rank-tujuan") : "iron";

			imgRankAwal.src = `img/rank/${valRankAwal}3.png`;
			imgRankTujuan.src = `img/rank/${valRankTujuan}3.png`;
		};

		btnOrder.onclick = function () {
			modalCheckOut.style.display = "none";
			Swal.fire({
				title: "Success",
				text: "Terimakasih",
				icon: "success",
      });
      localStorage.clear();
		};

		closeModalBtn.onclick = function () {
			modalCheckOut.style.display = "none";
		};

		window.onclick = function (event) {
			if (event.target == modalCheckOut) {
				modalCheckOut.style.display = "none";
			}
		};
	}

	if (document.querySelector(".agent")) {
		const allAgent = document.querySelectorAll(".agent");
		allAgent.forEach((agent) => {
			agent.addEventListener("click", (el) => {
				const currAgent = document.querySelector(".agent.check");
				if (currAgent && currAgent !== agent) {
					currAgent.classList.toggle("check");
				}
				agent.classList.toggle("check");
			});
		});
	}
});

const baseUrl = location.origin;
async function fetchData(url) {
	try {
		const response = await fetch(url);
		const data = await response.json();

		// Mengecek status respons
		if (!response.ok) {
			// Jika status bukan 200, lempar error dengan pesan dari server
			throw new Error(data.msg || "Terjadi kesalahan");
		}
		return data;
	} catch (error) {
		console.error("Fetch error:", error);
		throw error; // Lempar error untuk ditangani di luar
	}
}
document.addEventListener("DOMContentLoaded", (event) => {
	if (document.querySelector("#product-select-variant")) {
		const selectProduct = document.querySelector("#product-select-variant");
		selectProduct.addEventListener("change", async () => {
			try {
				const res = await fetchData(
					`${baseUrl}/admin/get/product/${selectProduct.value}`
				);
				const tbody = document.querySelector("#table-product tbody");
				tbody.innerHTML = "";
				res.forEach((item, index) => {
					const row = document.createElement("tr");
					row.innerHTML = `
                <th scope="row">${index + 1}</th>
                <td>${item.nama}</td>
                <td class="w-25"><img src="${baseUrl}/user/src/img/${
						item.jenis_product == "akun" ? "products" : "vp"
					}/${item.gambar}" class="img-thumbnail" alt="${item.nama}"></td>
                <td>${item.harga}</td>
                <td>${item.jenis_product} </td>
                <td>
                  <a href="${baseUrl}/admin/change/product/${
						item.id
					}" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
                  <a href="${baseUrl}/admin/delete/product/${
						item.id
					}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                </td>
            `;

					// Tambahkan baris ke tbody
					tbody.appendChild(row);
				});
				if (res.length <= 0) {
					tbody.innerHTML = `
          <tr>
              <th scope="row">#</th>
              <td>Data masih kosong</td>
            </tr>
            `;
				}
			} catch (err) {
				console.log(err);
			}
		});
	}
});

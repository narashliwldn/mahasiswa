const axios = window.axios;

const BASE_API_URL = 'http://localhost:8000/api'

export default {
    getAllMahasiswas: () =>
		axios.get(`${BASE_API_URL}/mahasiswas`),
	getOneMahasiswas: (id) =>
		axios.get(`${BASE_API_URL}/mahasiswas/${id}`),
	addMahasiswa: (mahasiswa) =>
		axios.post(`${BASE_API_URL}/mahasiswas`, mahasiswa),
	updateMahasiswa: (mahasiswa, id) =>
		axios.put(`${BASE_API_URL}/mahasiswas/${id}` , mahasiswa),
	deleteMahasiswa: (id) =>
        axios.delete(`${BASE_API_URL}/mahasiswas/${id}`),

}

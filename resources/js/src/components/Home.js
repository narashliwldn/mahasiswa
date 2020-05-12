import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import AppContainer from './AppContainer';
import api from '../api';

const Home = () => {
    const [mahasiswas, setMahasiswas] = useState(null);

    const fetchMahasiswas = () => {
        api.getAllMahasiswas().then(res => {
            const result = res.data;
            setMahasiswas(result.data)
        });
    }

    useEffect(() => {
        let isSubscribed = true
        fetchMahasiswas();
    }, []);

    const renderMahasiswas = () => {
        if(!mahasiswas) {
            return (
                <tr>
                    <td colSpan="24">
                        Loading Catalog...
                    </td>
                </tr>
            );
        }

        if(mahasiswas.length === 0) {
            return (
                <tr>
                    <td colSpan="24">
                        There is no data yet. Add one.
                    </td>
                </tr>
            );
        }

        return mahasiswas.map((mahasiswa) => (
            <tr>
                <td>{mahasiswa.id}</td>
                <td>{mahasiswa.Name}</td>
                <td>{mahasiswa.Faculty}</td>
                <td>{mahasiswa.NIM}</td>
                <td>{mahasiswa.Gender}</td>
                <td>
                    <Link
                        to={`/edit/${mahasiswa.id}`}
                        className="btn btn-warning"
                    >
                        Edit
                    </Link>
                    <button
                        type="button"
                        className="btn btn-danger"
                        onClick={() => {
                            api.deleteMahasiswa(mahasiswa.id)
                            .then(fetchMahasiswas)
                            .catch(err => {
                                alert('Failed to delete mahasiswa with id :' + mahasiswa.id);
                            });
                        }}
                    >
                        Delete
                    </button>
                </td>
            </tr>
            ))
    }

	return (
		<AppContainer
			title="Data Mahasiswa"
		>
			<Link to={'/create'} className="btn btn-primary">Add Mahasiswa</Link>
    				<div className="table-responsive">
    					<table className="table table-striped">
    						<thead>
    							<tr>
    								<th>ID</th>
    								<th>Name</th>
    								<th>Faculty</th>
    								<th>NIM</th>
    								<th>Gender</th>
                                    <th>Action</th>
    							</tr>
    						</thead>
    						<tbody>
                                { renderMahasiswas() }
    						</tbody>
    					</table>
    				</div>
		</AppContainer>
	);
};

export default Home;

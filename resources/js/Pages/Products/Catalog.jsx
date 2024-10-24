import React, { useState } from 'react';
import { router } from '@inertiajs/react';
import Card from '@Components/Card';
import AutenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Catalog({ products }) {
    const [search, setSearch] = useState('');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/', { search: search }, { preserveState: true });
    };

    const productsBlade = () => {
        window.location.href = route('products.index'); // La ruta a tu vista Blade
    };

    return (
        <>
            <AutenticatedLayout>
                <div className='py-12'>
                    <Head title='Catalogo' />
                    <div className='mx-auto max-w-7xl sm:px-6 lg:px-8'>
                        <div className='overflow-hidden bg-white shadow-sm sm:rounded-lg'>
                            <div className='p-6 text-gray-900'>

                                <form onSubmit={handleSearch} className="max-w-md mx-auto" >

                                    <label htmlFor="default-search" className='mb-2 text-sm font-medium text-gray-900 sr-only'>
                                        Buscar
                                    </label>

                                    <input value={search} onChange={(e) => setSearch(e.target.value)} type="search" id='default-search' className='block w-full p-4 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500' placeholder='Buscar Productos...' />
                                    <button type='submit' className='text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg'>
                                        Buscar
                                    </button>

                                </form>

                                {/* Se mapean los productos */}
                                <div className='grid grid-cols-2 md:grid-cols-3 gap-4 mt-6'>
                                    {products.map(product => (
                                        <Card key={product.id} product={product}></Card>
                                    ))}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </AutenticatedLayout>
        </>
    );

};
import React, { useState } from 'react';
import { router } from '@inertiajs/react';
import Card from '@/Components/Card';
import Modal from '@/Components/Modal';
import ProductDetailModal from '@/Components/ModalProduct';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

const Catalogo = ({ products }) => {
    const [searchTerm, setSearchTerm] = useState(''); // Estado para almacenar el término de búsqueda
    const [selectedProduct, setSelectedProduct] = useState(null); // Estado para el producto seleccionado
    const [showDetailModal, setShowDetailModal] = useState(false); // Estado para mostrar el modal

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/', { search: searchTerm }, { preserveState: true }); // Enviar búsqueda al backend usando Inertia
    };

    const openModal = (product = null) => {
        setSelectedProduct(product);
        setShowDetailModal(true);
    };

    const closeModal = () => {
        setShowDetailModal(false);
        setSelectedProduct(null);
    };

    // Filtrado de productos basado en el término de búsqueda
    const filteredProducts = products.filter((product) =>
        product.name.toLowerCase().includes(searchTerm.toLowerCase())
    );

    return (
        <AuthenticatedLayout>
            <div className="py-12">
                <Head title="Catálogo" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">

                            <h1 className="text-center text-2xl font-bold mb-4">Catálogo de Productos</h1>

                            {/* Formulario de búsqueda */}
                            <form onSubmit={handleSearch} className="max-w-md mx-auto mb-6">
                                <label
                                    htmlFor="default-search"
                                    className="mb-2 text-sm font-medium text-gray-900 sr-only">
                                    Buscar
                                </label>

                                <div className="relative">
                                    <input
                                        value={searchTerm}
                                        onChange={(e) => setSearchTerm(e.target.value)}
                                        type="search"
                                        id="default-search"
                                        className="block w-full p-4 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Buscar Productos..."
                                    />

                                    <button
                                        type="submit"
                                        className="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2"
                                    >
                                        Buscar
                                    </button>
                                </div>
                            </form>

                            {/* Renderizado de los productos filtrados */}
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {filteredProducts.map((product) => (
                                    <Card
                                        key={product.id}
                                        product={product}
                                        OpenEdit={() => openModal(product)}
                                        openDetailModal={() => openModal(product)} // Pasa la función para abrir el modal de detalles
                                    />
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Modal para mostrar los detalles del producto */}
            {showDetailModal && (
                <Modal onClose={closeModal}>
                    <ProductDetailModal
                        product={selectedProduct}
                        onClose={closeModal}
                    />
                </Modal>
            )}
        </AuthenticatedLayout>
    );
};

export default Catalogo;

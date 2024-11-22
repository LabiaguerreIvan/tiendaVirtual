import Modal from '@/Components/Modal';
import ProductForm from '@/Components/ProductForm';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import React, { useState } from 'react';

const Producto = ({ products }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    const openModal = (product) => {
        setSelectedProduct(product);
        setIsModalOpen(true);
    };

    const closeModal = () => {
        setIsModalOpen(false);
        setSelectedProduct(null);
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Productos
                </h2>
            }>
            <div className="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
                <h1 className="text-3xl font-bold mb-6">Gestión de Productos</h1>

                <div className="mb-6 flex justify-end">
                    <button
                        onClick={() => openModal()}
                        className="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                        Nuevo Producto
                    </button>
                </div>

                <div className="overflow-x-auto">
                    <table className="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead className="bg-gray-100">
                            <tr>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Imagen</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nombre</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Precio</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Descripción</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Acción</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-gray-200">
                            {products.length > 0 ? (
                                products.map((product) => (
                                    <tr key={product.id} className="hover:bg-gray-50 transition ease-in-out duration-150">
                                        <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{product.id}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <img src={product.imagen_url} alt="SIN FOTO" className="w-16 h-16 object-cover" />
                                        </td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{product.name}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{product.price}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{product.description}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900 flex space-x-2">
                                            <button 
                                                onClick={() => openModal(product)} 
                                                className="border-yellow-500 border px-2 py-1 hover:bg-yellow-300 rounded-lg text-yellow-500 hover:text-white inline-flex items-center"
                                            >
                                                <span className="material-icons mr-1">Editar</span>
                                            </button>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan={6} className="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                        No hay productos disponibles.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
        
            </div>
            {isModalOpen && (
                <Modal onClose={closeModal}>
                    <ProductForm
                        product={selectedProduct}
                        isEditMode={!!selectedProduct}
                        onClose={closeModal}
                    />
                </Modal>
            )}
    
        </AuthenticatedLayout>
    );
};

export default Producto;

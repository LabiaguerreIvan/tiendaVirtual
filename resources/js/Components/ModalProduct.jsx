import React from 'react';

const ProductDetailModal = ({ product, onClose }) => {
    console.log(product,"product");
    return (
        <div className="p-6 bg-white rounded-lg shadow-lg max-w-md mx-auto">
            <h3 className="text-xl font-semibold mb-4">Detalles del Producto</h3>
            <img 
                src={product?.image_url} 
                alt={product.name} 
                className="w-full h-48 object-cover rounded-lg mb-4"
            />
            <div className="space-y-2">
                <p className="text-gray-800">
                    <strong className='text-lg'>Nombre:</strong> {product.name}
                </p>
                <p className="text-gray-800">
                    <strong className='text-lg'>Descripción:</strong> {product.description}
                </p>
                <p className="text-gray-800">
                    <strong className='text-lg'>Precio:</strong> ${product.price}
                </p>


            </div>
            <div className="mt-6">
                <button
                    onClick={onClose}
                    className="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                >
                    Cerrar
                </button>
            </div>
        </div>
    );
};

export default ProductDetailModal;

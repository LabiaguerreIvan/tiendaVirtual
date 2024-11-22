import React from 'react';

const Card = ({ product, openDetailModal,OpenEdit }) => {
    return (
        <div className="border border-gray-200 rounded-lg shadow-sm p-4 mb-4">
            <img src={product.image_url} alt="Sin Imagen" className="w-full h-62 object-cover mb-2" />
            <h3 className="text-lg font-semibold text-gray-900">{product.name}</h3>
            <p className="text-md text-gray-700">Precio: ${product.price}</p>
            {/* <p className="text-sm text-gray-500 mb-4">{product.description}</p> */}
            <div className="flex justify-between mt-2">
                <button
                    className="text-blue-600 hover:text-white border border-blue-600 rounded-lg ps-2 pe-2 hover:bg-blue-600 inline-flex items-center"
                    onClick={() => openDetailModal(product)} // Llama a la función para abrir el modal de detalles
                >
                    <span className="material-icons mr-1">Ver Info</span> 
                </button>
            </div>
        </div>
    );
};

export default Card;

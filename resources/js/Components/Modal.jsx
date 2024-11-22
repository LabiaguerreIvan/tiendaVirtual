import React from 'react';

const Modal = ({ show = true, onClose, children }) => {
    // Si `show` es false, no renderizar el modal
    if (!show) return null;

    return (
        <div className="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div className="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full relative">

                {/* Contenido del modal */}
                {children}
            </div>
        </div>
    );
};

export default Modal;

import { useForm } from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import GuestLayout from '@/Layouts/GuestLayout';
import axios from 'axios';

export default function ProductForm({ product = {}, isEditMode = false, onClose }) {

    const { data, setData, post, put, processing, errors, reset } = useForm({
        name: product.name || '',
        price: product.price || '',
        description: product.description || '',
        image_url: product.image_url || null,
    });

    const handleFileChange = (e) => {
        console.log(e.target.files[0]);
        setData('image_url', e.target.files[0]); // Guardar el archivo seleccionado
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log("Datos antes de enviar:", data); // Debug

        if (isEditMode) {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('name', data.name);
            formData.append('price', data.price);
            formData.append('description', data.description);

            // Debug para ver si la imagen está presente
            if (data.image_url instanceof File) {
                console.log("Imagen seleccionada:", data.image_url);
                formData.append('image_url', data.image_url);
            }

            // Debug para ver el contenido del FormData
            for (let pair of formData.entries()) {
                console.log('FormData contiene:', pair[0], pair[1]);
            }

            // Usar axios directamente en lugar de Inertia
            axios.post(route('products.update', product.id), formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            })
                .then(response => {
                    console.log("Respuesta:", response);
                    reset();
                    onClose();
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        } else {
            // Código existente para crear nuevo producto
            post(route('products.store'), data, {
                onFinish: () => reset(),
            });
        }
    };

    return (
        <>
            <h2 className='bg-gray-100 rounded-lg shadow-sm mb-5 p-2'>
                {isEditMode ? 'Editar Producto' : 'Agregar Producto'}
            </h2>
            <form onSubmit={handleSubmit} encType="multipart/form-data">
                {/* Nombre */}
                <div>
                    <InputLabel htmlFor="name" value="Nombre del Producto" />
                    <TextInput
                        id="name"
                        type="text"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        onChange={(e) => setData('name', e.target.value)}
                    />
                    <InputError message={errors.name} className="mt-2" />
                </div>

                {/* Precio */}
                <div className="mt-4">
                    <InputLabel htmlFor="price" value="Precio" />
                    <TextInput
                        id="price"
                        type="number"
                        name="price"
                        value={data.price}
                        className="mt-1 block w-full"
                        onChange={(e) => setData('price', e.target.value)}
                    />
                    <InputError message={errors.price} className="mt-2" />
                </div>

                {/* Descripción */}
                <div className="mt-4">
                    <InputLabel htmlFor="description" value="Descripción" />
                    <textarea
                        id="description"
                        name="description"
                        value={data.description}
                        className="mt-1 block w-full"
                        onChange={(e) => setData('description', e.target.value)}
                    ></textarea>
                    <InputError message={errors.description} className="mt-2" />
                </div>

                {/* Imagen */}
                <div className="mt-4">
                    <InputLabel htmlFor="imagen" value="Subir Imagen" />
                    <input
                        id="image_url"
                        type="file"
                        name="image_url"
                        className="mt-1 block w-full"
                        onChange={handleFileChange}
                    />
                    <InputError message={errors.image_url} className="mt-2" />
                </div>

                {/* Botón para guardar */}
                <div className="mt-4 flex items-center justify-end">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        {isEditMode ? 'Actualizar Producto' : 'Crear Producto'}
                    </PrimaryButton>
                    <PrimaryButton className="ms-4" onClick={onClose}>
                        Cerrar
                    </PrimaryButton>
                </div>
            </form>
        </>
    );
}

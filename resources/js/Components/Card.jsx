export default function Card({ product }){
    return (
        <div className="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

            <a href="#">
                <img className="p-8 rounded-t-lg" src={product.image_url} alt="Product Image" />
            </a>

            <div className="px-5 pb-5">
                <a href="#">
                    <h5 className="text-xl font-semibold tracking-tight text-gray-900">
                        {product.name}
                    </h5>
                </a>

                <div className="flex items-center justify-between">
                    <span className="text-3xl font-bold text-gray-900">
                        ${product.price}
                    </span>
                </div>

            </div>
        </div>
    );
};
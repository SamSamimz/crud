import { useEffect } from 'react'
import './App.css'
import axios from 'axios'
import 'animate.css';
import { useState } from 'react'
function App() {
  const [products , setProducts] = useState([]);
  const [loading , setLoading] = useState(true);

  useEffect(() => {
    fethData();
  },[products]);

  function deleteItem(id) {
    try {
      const response = axios.delete(`http://127.0.0.1:8000/api/products/${id}`);
    }catch(error) {
      console.error('Error find', error);
    }
  }

  const fethData = async () => {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/products');
      setProducts(response.data)
      setLoading(false)
    }catch(error) {
      console.error('Error find', error);
    }
  }



  return (
    <div className='container'>
      {loading &&  <div style={{height: '100vh',width: '100%',display: 'flex',alignItems: 'center',justifyContent: 'center'}}>
          <div className="spinner-grow text-secondary" role="status"></div>
        </div>}
        <h2 className='text-center py-5 animate__animated animate__heartBeat'>I am here to steal your heart😍😍!</h2>
        <div className="col-10 mx-auto">
          <div className="d-flex gap-3 align-items-center justify-content-center flex-wrap">
            {products && 
                   products.map((item,index) => (
                    <div key={index} className='py-6 px-3 bg-light rounded'>
                    <h4>{item.name}</h4>
                    <p className='text-info'>{item.price}</p>
                    <button onClick={()=>{ deleteItem(item.id) }} className="btn btn-danger">Delete</button>
                </div>
                   ))
               }

          </div>
        </div>
    </div>
  )
}

export default App

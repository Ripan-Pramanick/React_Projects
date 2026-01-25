import React from 'react'
import { useParams } from 'react-router-dom';

const User = () => {
    const { id } = useParams();
  return (
    <div>
      <div className='text-center text-3xl bg-gray-800 text-white p-4'>User: {id}</div>
    </div>
  )
}

export default User

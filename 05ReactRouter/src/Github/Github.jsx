
import { useLoaderData } from 'react-router-dom';
// import { useEffect, useState } from 'react';

const Github = () => {
    const data = useLoaderData();

    // useEffect(() => {
    //     fetch('https://api.github.com/users/hiteshchoudhary')
    //     .then(response => response.json())
    //     .then(data => setData(data))
    // }, [])

  return (
  <>
    <div 
    className='text-center text-3xl bg-gray-800 text-white p-4'
    >Github Follwers: {data.followers}
    </div>

    <img 
    className='mx-auto mt-10 rounded-full w-52 h-52'
    src={data.avatar_url} 
    alt="Github picture" />

    <h2 
    className='text-center text-2xl mt-4 font-semibold'
    >{data.name}
    </h2>

    <p 
    className='text-center text-gray-600'
    >{data.bio}
    </p>
  </>
  )
}

export default Github;

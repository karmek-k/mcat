import { useEffect, useState } from 'react';

function App() {
  const [tracks, setTracks] = useState<{ title: string }[]>([]);

  useEffect(() => {
    fetch('http://localhost:8000/api/tracks')
      .then(data => data.json())
      .then(setTracks);
  }, []);

  return (
    <>
      <h1>mcat</h1>
      <ul>
        {tracks.map(track => (
          <li>{track.title}</li>
        ))}
      </ul>
    </>
  );
}

export default App;

import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import HomePage from './pages/HomePage';
import DentalServices from './pages/DentalServices';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Navigate to="/best-dental-clinic-in-kolkata" replace />} />
        <Route path="/best-dental-clinic-in-kolkata" element={<DentalServices />} />
      </Routes>
    </Router>
  );
}

export default App;

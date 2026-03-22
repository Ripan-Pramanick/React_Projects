import { createContext, useContext } from "react";

// 1. Create the Context (and fix spelling to "Theme")
export const ThemeContext = createContext({
    themeMode: "light",
    darkTheme: () => {},
    lightTheme: () => {},
});

// 2. Export the Provider (Common pattern is to name it ThemeProvider)
export const ThemeProvider = ThemeContext.Provider;

// 3. Custom Hook
export default function useTheme(){
    // Must pass the Context Object created in step 1, NOT the Provider
    return useContext(ThemeContext);
}

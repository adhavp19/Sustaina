import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class cococola {
    /**
     * No argument constructor--private to prevent instantiation.
     */
    private cococola() {
    }

    /**
     * Main method.
     *
     * @param args
     *            the command line arguments
     */
    public static void main(String[] args) {
        String fileName = "input.txt";
        StringBuilder content = new StringBuilder();

        try {
            // Open the file for reading
            FileReader fileReader = new FileReader(fileName);
            BufferedReader bufferedReader = new BufferedReader(fileReader);

            String line;
            // Read each line from the file and append it to the content string
            while ((line = bufferedReader.readLine()) != null) {
                content.append(line).append("\n");
            }

            // Close the file
            bufferedReader.close();

            // Print or use the content as needed
            String fileContent = content.toString();
            System.out.println("File Content:\n" + fileContent);
        } catch (IOException e) {
            System.err.println("An error occurred while reading the file: " + e.getMessage());
        }
    }
}

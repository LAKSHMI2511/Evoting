package com.hashfold.blockchain.app;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import com.hashfold.blockchain.config.BlockchainConfig;

/**
 * Starts WebService and initializes SpringBoot framework.
 * 
 * @author Praveendra Singh
 *
 */
@SpringBootApplication(scanBasePackages = {"com.hashfold.blockchain.service", "com.hashfold.blockchain.api", "com.hashfold.blockchain.config","com.hashfold.blockchain.domain"} )
public class BlockchainApplication {

	public static void main(String[] args) {
		SpringApplication.run(BlockchainApplication.class, args);
	}
}
